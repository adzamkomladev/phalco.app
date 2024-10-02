<?php

namespace App\Actions\Auth;

use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Login
{
    use AsAction;

    public function asController(ActionRequest $request)
    {
        dd('hello');

        return back();
    }

    public function handle()
    {
        // ...
    }
}
