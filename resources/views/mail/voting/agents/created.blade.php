<x-mail::message>
# You've been invited to join {{ $organizationName }} as a voting agent.


Hi {{ $agentName}},

Kindly use the credentials below to login to {{ config('app.name') }}.

Email: {{ $email }}
Password: {{ $password }}

<x-mail::button :url="$loginUrl">
Login here
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
