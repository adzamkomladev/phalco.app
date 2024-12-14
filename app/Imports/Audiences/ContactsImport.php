<?php

namespace App\Imports\Audiences;

use App\Actions\Audiences\Contacts\Store;
use App\Data\Audiences\Show\NotificationData;
use App\Events\Audiences\ContactImported;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithSkipDuplicates;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Row;

class ContactsImport implements OnEachRow, ShouldQueue, WithChunkReading, WithHeadingRow, WithSkipDuplicates
{
    use Importable;

    private int $totalRows = 1;

    private int $rowCount = 0;

    public function __construct(
        public readonly int $userId,
        public readonly int $audienceId
    ) {}

    public function chunkSize(): int
    {
        return 100;
    }

    public function onRow(Row $row)
    {
        $this->rowCount++;
        $rowIndex = $row->getIndex();
        $row = $row->toArray();

        Store::dispatch($this->userId, $this->audienceId, $row);

        $this->broadcastProgress();

        return $rowIndex;
    }

    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function (BeforeImport $event) {
                $totalRows = $event->getReader()->getTotalRows();

                if (! empty($totalRows)) {
                    $this->totalRows = $totalRows['Worksheet'];
                }
            },
        ];
    }

    private function broadcastProgress(): void
    {
        $notification = cache("audiences.{$this->audienceId}.imports.notifications");

        if ($notification) {
            $notification['percentageCompleted'] = round($this->rowCount / $this->totalRows * 100);
            cache("audiences.{$this->audienceId}.imports.notifications", $notification);
            ContactImported::dispatch($this->audienceId, NotificationData::from($notification));
        }
    }
}
