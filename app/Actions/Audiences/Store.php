<?php

namespace App\Actions\Audiences;

use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Store
{
    use AsAction;

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:100'],
            'description' => ['nullable', 'string'],
            'uploaded_file' => ['required', 'url']
        ];
    }

    public function asController(ActionRequest $request)
    {
        return redirect()->route('audiences.show', ['id' => 1]);
    }

    public function handle(int $userId, int $organizationId, array $data) {}
}
