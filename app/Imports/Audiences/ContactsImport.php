<?php

namespace App\Imports\Audiences;

use App\Actions\Audiences\Contacts\Store;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithSkipDuplicates;
use Maatwebsite\Excel\Row;

class ContactsImport implements OnEachRow, ShouldQueue, WithChunkReading, WithHeadingRow, WithSkipDuplicates
{
    use Importable;

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
        $rowIndex = $row->getIndex();
        $row = $row->toArray();

        Store::dispatch($this->userId, $this->audienceId, $row);

        return $rowIndex;
    }
}
