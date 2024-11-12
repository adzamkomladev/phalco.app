<?php

namespace App\Actions\Audiences\Contacts;

use App\Models\Audience;
use App\Models\Contact;
use Carbon\Carbon;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Store
{
    use AsAction;

    public string $jobQueue = 'imports';

    public function asJob(int $userId, int $audienceId, array $row): void
    {
        $this->handle($userId, $audienceId, $row);
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['nullable', 'string', 'max:100'],
            'other_names' => ['nullable', 'string', 'max:100'],
            'gender' => ['nullable', 'string', 'max:50'],
            'date_of_birth' => ['nullable', 'date'],
            'avatar' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'max:100'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'country' => ['nullable', 'string', 'max:50'],
        ];
    }

    public function asController(int $id, ActionRequest $request)
    {
        $this->handle($request->user()->id, $id, $request->validated());

        return redirect()->route('audiences.show', ['id' => $id]);
    }

    public function handle(int $userId, int $audienceId, array $data)
    {
        return Contact::create([
            'user_id' => $userId,
            'audience_id' => $audienceId,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'other_names' => $data['other_names'],
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'] ? Carbon::parse($data['date_of_birth']) : null,
            'avatar' => $data['avatar'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'country' => $data['country'],
        ]);
    }
}
