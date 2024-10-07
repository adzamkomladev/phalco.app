<?php

namespace App\Actions\Elections;

use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class SwitchElection
{
    use AsAction;

    public function asController(ActionRequest $request)
    {


        return back()->with('success', 'Election switch.');
    }

    public function handle()
    {
        // ...
    }
}
