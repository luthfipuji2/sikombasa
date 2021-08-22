@component('mail::message')
# {{ $data['title'] }}
 
Halo Translator SIKOMBASA!<br>
Kamu telah menerima permintaan revisi dari klien, segera periksa akunmu ya!
 
@component('mail::button', ['url' => $data['url']])
Visit
@endcomponent
 
Terimakasih,<br>
SIKOMBASA Team
@endcomponent