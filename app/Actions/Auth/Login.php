<?php

namespace App\Actions\Auth;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;


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
