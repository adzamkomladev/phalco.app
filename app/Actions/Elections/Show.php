<?php

namespace App\Actions\Elections;

use App\Models\Election;
use Lorisleiva\Actions\Concerns\AsAction;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return hybridly('elections.selected', $this->handle($id));
    }

    public function handle(int $electionId)
    {
        return [
            'election' => Election::find($electionId),
        ];
    }
}
