@component('mail::message')
# Introduction

Youre request a password reset, please click in the password reset button to proceed.

@component('mail::button', ['url' => 'http://localhost/login-back/public/api/auth/reset-password?token='.$token])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
