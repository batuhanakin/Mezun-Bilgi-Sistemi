@foreach($todos as $todo)

    <p>{{ $todo->id }} - {{ $todo->title }} <a href="{{ route("todo.edit", $todo->id) }}"> duzenle</a> </p>
@endforeach


<a href="{{ route("todo.create") }}"> yeni ekle</a>
{{--todos: index ve duzenleme sayfasinda duzenleme butonlari
//todo giris sayfasi--}}

{{ $todos->links() }}  {{-- sayfa numaralari --}} 