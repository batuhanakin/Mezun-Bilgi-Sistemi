@component('mail::message')
    "{{$internship->baslik}}" ilanı onayınızı bekliyor.
@component('mail::button', ['url' => route('internship.edit',$internship->id)])
İlana Git
@endcomponent

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
