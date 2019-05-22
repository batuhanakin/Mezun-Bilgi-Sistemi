@extends('layouts.index')
@section("content")
    <form action="{{route("user.update",$user->id)}}" method="post">
        @csrf
        @method("put")
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">Bilgileriniz kaydedildi!</div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">Bilgileriniz kaydedilirken hata oluştu!</div>
               @endif
                <div class="form-group">
                    <h3>İsim</h3>
                    <input required name="isim" class="form-control" placeholder="İsim" value="{{old("isim",$user->isim)}}">
                </div>
                @error('isim')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <h3>E-Mail</h3>
                    <input type="email" required name="email" class="form-control" placeholder="E-Mail" value="{{old("email",$user->email)}}">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="form-group">
                    <h3>Adres</h3>
                    <textarea name="adres" class="form-control" placeholder="Adres" rows="4">{{old("adres",$user->adres)}}</textarea>
                </div>

                <div class="form-group">
                    <h3>Mezuniyet Yılı</h3>
                    <input required name="mezuniyet_yili" type="number" class="form-control" min="1950" max="{{today()->year}}" step="1" value="{{old("mezuniyet_yili",$user->mezuniyet_yili)}}" />
                </div>
                @error('mezuniyet_yili')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <h3>Cinsiyet</h3>
                    <select required name="cinsiyet" class="form-control">
                        <option value="Kadın" {{old("cinsiyet",$user->cinsiyet)=="Kadın"?"selected":""}}>Kadın</option>
                        <option value="Erkek" {{old("cinsiyet",$user->cinsiyet)=="Erkek"?"selected":""}}>Erkek</option>
                    </select>
                </div>
                @error('cinsiyet')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-success pull-right">Güncelle</button>
            </div>
        </div>
    </form>

@endsection