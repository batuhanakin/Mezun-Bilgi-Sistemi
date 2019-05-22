<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/jumbotron-narrow/">
    <title>{{config('app.name')}}</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset("dist/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="header clearfix">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route("home")}}">{{config('app.name')}}</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    {{--
                    sol linkler
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    --}}

                    <form class="navbar-form navbar-left" action="{{route('home')}}" method="GET">
                        <div class="form-group">
                            <input name="search" class="form-control" placeholder="İlan Ara">
                        </div>
                        <button type="submit" class="btn btn-default">Ara</button>
                    </form>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="text-secondary" href="{{route("home")}}">İlanlar</a></li>
                        @guest
                            <li><a href="{{route('login')}}">Giriş Yap</a></li>
                            <li><a href="{{route('register')}}">Üye Ol</a></li>
                        @endguest
                        @auth
                            <li><a class="text-secondary" href="{{route("internship.create")}}">Yeni İlan Ekle</a></li>
                            @if(auth()->user()->admin)
                                    <li><a class="text-secondary" href="{{route("user.index")}}">Mezunlar</a></li>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{auth()->user()->isim}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route("user.edit",auth()->id())}}">Bilgilerimi Düzenle</a></li>
                                    <li><a href="{{route("user.show",auth()->id())}}">İlanlarım ve Profilim</a></li>
                                    <li><a href="{{route('logout')}}">Çıkış Yap</a></li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <h3>@yield("title")</h3>
    </div>
    @yield('content')
</div> <!-- /container -->

<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="{{asset("dist/js/bootstrap.min.js")}}"></script>
@include('layouts.footer')
@yield('footer')
</body>
</html>
