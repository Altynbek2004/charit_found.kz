@component('mail::message')
    # Сброс пароля

    Вы получили это письмо, потому что мы получили запрос на сброс пароля для вашей учетной записи.

    @component('mail::button', ['url' => url(config('app.url').route('password.reset', ['token' => $token, 'email' => $email], false))])
        Сбросить пароль
    @endcomponent

    Эта ссылка для сброса пароля истечет через {{ config('auth.passwords.users.expire') }} минут.

    Если вы не запрашивали сброс пароля, никаких дальнейших действий не требуется.

    С уважением,<br>
    {{ config('app.name') }}
@endcomponent
