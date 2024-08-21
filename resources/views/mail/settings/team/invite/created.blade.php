<x-mail::message>
# Invitation to join {{ $teamName }}

We want to invite you to join {{ $teamName }} organization on {{ config('app.name') }}.
Click the link below to accept the invitation

<x-mail::button :url="$url">
Accept Invitation
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
