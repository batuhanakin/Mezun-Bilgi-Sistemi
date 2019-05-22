@extends('layouts.index')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Mezunlar</div>
        <!-- Table -->
        <table class="table">
            @foreach($users as $user)
                <tr>
                    <td><a href="{{route('user.show',$user->id)}}">{{$user->isim}}</a></td>
                    <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                    <td>{{$user->cinsiyet}}</td>
                    <td>{{$user->mezuniyet_yili}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('user.edit',$user->id)}}">Düzenle</a>
                        <a class="btn btn-danger" href="{{route('user.delete',$user->id)}}">Sil</a>
                        <a class="btn btn-info" href="{{route('user.show',$user->id)}}">Görüntüle</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection