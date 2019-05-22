@extends('layouts.index')
@section('content')
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Mezun Bilgileri</h3>
        </div>
        <div class="panel-body">
            <b>İsim:</b> {{$user->isim}}<br>
            <b>E-Mail:</b> {{$user->email}}<br>
            <b>Mezuniyet Yılı:</b> {{$user->mezuniyet_yili}}<br>
        </div>
    </div>
    @if($internships->isEmpty())
        <div class="alert alert-info" role="alert">
            Henüz hiç ilan yok!
        </div>
    @endif

    @foreach($internships as $internship)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{$internship->baslik}} @unless($internship->aktif)<span class="label label-warning">Onay Bekliyor</span>@endunless</h3>
                <span class="topright">
                    <a class="btn btn-info pull-right" href="{{route('internship.show',$internship->id)}}">İncele</a>
                    @if(Auth::check() && (auth()->id()==$internship->user_id || auth()->user()->admin))
                        @if($internship->aktif || auth()->user()->admin)
                        <a class="btn btn-danger pull-right" href="{{route('internship.delete',$internship->id)}}">Sil</a>
                        @endif
                        <a class="btn btn-warning pull-right" href="{{route('internship.edit',$internship->id)}}">Düzenle</a>
                    @endif
                </span>
            </div>
            <div class="panel-body">
                {!! Str::limit(strip_tags($internship->aciklama),200)!!}
            </div>
        </div>
    @endforeach
    <div class="text-center">{{$internships->links()}}</div>
    <style>
        .topright > a{
            margin-top: -26px;
        }
    </style>


@endsection