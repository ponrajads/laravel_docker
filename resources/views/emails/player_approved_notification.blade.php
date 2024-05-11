@component('mail::message')
# Player Registration Approved

Dear {{ $user->name }},

Your player registration has been approved. You can now log in with the following details:

- **Username:** {{ $user->username }}
- **Password:** {{ $password }}

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thank you for registering with us!

Regards,<br>
IRFU Team
@endcomponent
