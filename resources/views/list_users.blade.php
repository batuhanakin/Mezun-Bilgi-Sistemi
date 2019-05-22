@extends('layouts.index')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Mezunlar</div>
        <!-- Table -->
        <table class="table">
            @foreach($users as $user)
                <tr>
                    <td>{{$user->isim}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->cinsiyet}}</td>
                    <td>{{$user->mezuniyet_yili}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('user.edit',$user->id)}}">Düzenle</a>
                        <a class="btn btn-danger" href="{{route('user.delete',$user->id)}}">Sil</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>



@endsection