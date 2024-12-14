<?php

namespace App\Actions\Audiences;

use App\Imports\Audiences\ContactsImport;
use App\Models\Audience;
use App\Models\User;
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
            'uploaded_contacts' => ['nullable', 'string'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        try {
            $audience = $this->handle(
                $request->user(),
                $request->validated()
            );

            return redirect()->route('audiences.show', ['id' => $audience->id]);
        } catch (\Exception $e) {
            dd($e);
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Handles the creation of a new Audience.
     *
     * @param  array  $data  The data for creating the audience, including 'name' and 'description'.
     * @return Audience The newly created Audience instance.
     */
    public function handle(User $user, array $data): Audience
    {
        $userId = $user->id;
        $organizationId = $user->selected_organization_id;

        $audience = Audience::create([
            'user_id' => $userId,
            'organization_id' => $organizationId,
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => 'active',
        ]);

        if (isset($data['uploaded_contacts'])) {
            cache("audiences.{$audience->id}.imports.notifications", [
                'creator' => [
                    'name' => $user->name,
                    'avatar' => $user->avatar,
                ],
                'title' => 'Contact uploads',
                'type' => 'contacts',
                'percentageCompleted' => 0,
                'broadcastTopic' => "audiences.{$audience->id}.contact.import",
                'createdAt' => now(),
            ]);

            (new ContactsImport($userId, $audience->id))
            ->queue($data['uploaded_contacts'])
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
        if (app()->environment('production')) {
            $contents = file_get_contents($url);

            return $contents;
        }

        $path = $this->removeDomain($url);

        return str_replace('/storage/', '', $path);
    }
}
