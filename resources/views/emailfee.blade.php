@component('mail::message')
# {{ $data['title'] }}

Halo Translator SIKOMBASA!<br>
Selamat! Kamu telah menerima pembayaran dari kami, segera periksa akunmu untuk memastikan.
Semoga harimu menyenangkan!

@component('mail::button', ['url' => $data['url']])
Visit
@endcomponent

Thanks,<br>
SIKOMBASA Team
@endcomponent
