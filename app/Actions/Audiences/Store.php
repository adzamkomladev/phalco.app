<?php

namespace App\Actions\Audiences;

use App\Imports\Audiences\ContactsImport;
use App\Models\Audience;
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
            'uploaded_contacts' => ['nullable', 'url'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        $audience = $this->handle(
            auth()->id(),
            $request->user()->selected_organization_id,
            $request->validated()
        );

        return redirect()->route('audiences.show', ['id' => $audience->id]);
    }

    /**
     * Handles the creation of a new Audience.
     *
     * @param  int  $userId  The ID of the user creating the audience.
     * @param  int  $organizationId  The ID of the organization to which the audience belongs.
     * @param  array  $data  The data for creating the audience, including 'name' and 'description'.
     * @return Audience The newly created Audience instance.
     */
    public function handle(int $userId, int $organizationId, array $data): Audience
    {
        $audience = Audience::create([
            'user_id' => $userId,
            'organization_id' => $organizationId,
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => 'active',
        ]);

        if (isset($data['uploaded_contacts'])) {
            (new ContactsImport($userId, $audience->id))
                ->queue($this->getFilePath($data['uploaded_contacts']))
                ->allOnQueue('imports');
        }

        return $audience;
    }

    private function removeDomain(string $url): string
    {
        $parsedUrl = parse_url($url);

        if ($parsedUrl === false) {
            throw new \Exception('Could not parse URL');
        }

        return $parsedUrl['path'];
    }

    private function getFilePath(string $url): string
    {
        $path = $this->removeDomain($url);

        return str_replace('/storage/', '', $path);
    }
}
