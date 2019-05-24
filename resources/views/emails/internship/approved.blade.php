@component('mail::message')
"{{$internship->baslik}}" ilanınız yönetici tarafından onaylanmıştır.
@component('mail::button', ['url' => route('internship.show',$internship->id)])
    İlana Git
@endcomponent

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
