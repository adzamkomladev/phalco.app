<x-mail::message>
# Invitation to join {{ $organizationName }}

We want to invite you to join {{ $organizationName }} organization on {{ config('app.name') }}.
Click the link below to accept the invitation

<x-mail::button :url="$inviteUrl">
Accept Invitation
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
