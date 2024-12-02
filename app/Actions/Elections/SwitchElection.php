<?php

namespace App\Actions\Elections;

use App\Models\Election;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SwitchElection
{
    use AsAction;

    public function asController(ActionRequest $request)
    {

        $res = $this->handle(auth()->id(), $request->input('election_id'));

        if (! $res) {
            return back()->with('error', 'Election not found.');
        }

        return hybridly()->external(url()->previous());
    }

    public function handle(int $userId, int $electionId)
    {
        $election = Election::find($electionId);

        if (! $election) {
            return null;
        }

        cache()
            ->set("elections.selected.{$userId}", [
                'id' => $election->id,
                'name' => $election->name,
                'logo' => $election->logo,
                'end' => $election->end,
            ]);

        return $election;
    }
}
