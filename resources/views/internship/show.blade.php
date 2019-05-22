@extends('layouts.index')
@section('content')
    <h1 class="page-header text-center">
        {{$internship->baslik}}
    </h1>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">İlan Bilgileri</h3>
        </div> <div class="panel-body">{!! $internship->aciklama!!}</div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Şirket Bilgileri</h3>
        </div>
        <div class="panel-body">{{$internship->sirket}}</div>
    </div>

    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Şirket Bilgileri</h3>
        </div>
        <div class="panel-body">
            <b>İsim:</b> {{$internship->user->isim}}<br>
            <b>E-Mail:</b> {{$internship->user->email}}<br>
            <b>Mezuniyet Yılı:</b> {{$internship->user->mezuniyet_yili}}<br>
        </div>
    </div>
@endsection