<?php

namespace App\Actions\Assets;

use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Upload
{
    use AsAction;

    public function rules(): array
    {
        return [
            'file' => ['required'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        $url = $this->handle($request);

        return response()->json(['url' => $url]);
    }

    public function handle(ActionRequest $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $storagePath = $request->query('path') ?? 'general';

            if (app()->isProduction()) {
                $path = $request->file->storePubliclyAs("uploads/{$storagePath}", $file->hashName());

                return $path;
            }

            $path = $request->file->storePubliclyAs("uploads/{$storagePath}", $file->hashName(), 'public');

            return $path;
        }

        return null;
    }
}
