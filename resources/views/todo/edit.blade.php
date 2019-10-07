@isset($todo)
{{ Form::model($todo, ['route' => ['todo.update', $todo], 'method' => 'put']) }}
@else
{{ Form::open(['route' => 'todo.store']) }}
@endisset
{{ Form::text('title') }}
{{ Form::submit('Submit') }}
{!! Form::close() !!}
@isset($todo)
{{ Form::open(['route' => ['todo.destroy', $todo], 'method' => 'delete']) }}
{{ Form::submit('delete') }}
{!! Form::close() !!}
@endisset





