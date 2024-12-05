<?php

namespace App\Support\Gateways;

use Exception;
use Illuminate\Support\Facades\Http;

class Arkesel
{
    public function sendSms(
        array $recipients,
        string $message,
        ?string $sender = null
    ) {
        $response = Http::withHeaders([
            'api-key' => config('services.arkesel.key'),
        ])->post(config('services.arkesel.url').config('services.arkesel.sms.urls.send'), [
            'recipients' => $recipients,
            'message' => $message,
            'sender' => $sender ?? config('services.arkesel.otp.sender'),
        ]);

        if (! $response->successful()) {
            $data = $response->json();

            throw new Exception($data['message']);
        }

        return $response->json();
    }

    public function sendOtp(
        string $phone,
        ?string $message = null,
        ?string $sender = null,
        ?string $type = null,
        ?string $medium = null,
        ?string $expiry = null,
        ?string $length = null
    ) {
        $response = Http::withHeaders([
            'api-key' => config('services.arkesel.key'),
        ])->post(config('services.arkesel.url').config('services.arkesel.otp.urls.send'), [
            'number' => $phone,
            'message' => $message ?? config('services.arkesel.otp.message'),
            'sender_id' => $sender ?? config('services.arkesel.otp.sender'),
            'type' => $type ?? config('services.arkesel.otp.type'),
            'medium' => $medium ?? config('services.arkesel.otp.medium'),
            'expiry' => $expiry ?? config('services.arkesel.otp.expiry'),
            'length' => $length ?? config('services.arkesel.otp.length'),
        ]);

        if (! $response->successful()) {
            $data = $response->json();
            if (is_array($data) && in_array('code', $data)) {
                throw new Exception($data['message']);
            }

            throw new Exception('Failed to send otp');
        }

        return $response->json();
    }

    public function verifyOtp(
        string $phone,
        string $code,
    ): array {
        $response = Http::withHeaders([
            'api-key' => config('services.arkesel.key'),
        ])->post(config('services.arkesel.url').config('services.arkesel.otp.urls.verify'), [
            'number' => $phone,
            'code' => $code,
        ]);

        if (! $response->successful()) {
            $data = $response->json();
            if (is_array($data) && in_array('code', $data)) {
                throw new Exception($data['message']);
            }

            throw new Exception('Failed to verify code');
        }

        return $response->json();
    }
}
