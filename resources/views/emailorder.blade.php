@component('mail::message')
# {{ $data['title'] }}

Halo Translator SIKOMBASA!<br>
Ada pesanan baru! Ayo segera buka akunmu dan ambil pesanan berikut.

@component('mail::button', ['url' => $data['url']])
Visit
@endcomponent

Thanks,<br>
SIKOMBASA Team
@endcomponent
