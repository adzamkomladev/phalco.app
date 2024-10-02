<?php

namespace App\Imports\Voting;

use App\Actions\Voting\Agents\SetupAgentFromRowImport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithSkipDuplicates;
use Maatwebsite\Excel\Row;

class AgentsImport implements OnEachRow, ShouldQueue, WithChunkReading, WithHeadingRow, WithSkipDuplicates
{
    use Importable;

    public function __construct(
        public readonly int $electionId,
        public readonly int $organizationId
    ) {}

    public function chunkSize(): int
    {
        return 100;
    }

    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row = $row->toArray();

        SetupAgentFromRowImport::dispatch($this->electionId, $this->organizationId, $row);

        return $rowIndex;
    }
}
