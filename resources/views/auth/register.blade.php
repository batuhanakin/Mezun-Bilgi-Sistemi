@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Üye Ol</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">İsim</label>

                            <div class="col-md-6">
                                <input id="isim" type="text" class="form-control @error('isim') is-invalid @enderror" name="isim" value="{{ old('isim') }}" required autocomplete="name" autofocus>

                                @error('isim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adres" class="col-md-4 col-form-label text-md-right">Adres</label>

                            <div class="col-md-6">
                                <textarea name="adres" class="form-control" placeholder="Adres" rows="4">{{old("adres")}}</textarea>
                                @error('adres')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cinsiyet" class="col-md-4 col-form-label text-md-right">Cinsiyet</label>

                            <div class="col-md-6">
                                <select required name="cinsiyet" class="form-control">
                                    <option value="Kadın" {{old("cinsiyet")=="Kadın"?"selected":""}}>Kadın</option>
                                    <option value="Erkek" {{old("cinsiyet")=="Erkek"?"selected":""}}>Erkek</option>
                                </select>
                                @error('cinsiyet')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="mezuniyetyili" class="col-md-4 col-form-label text-md-right">Mezuniyet Yılı</label>
                            <div class="col-md-6">
                                <input required name="mezuniyetyili" type="number" class="form-control" min="1950" max="{{today()->year}}" step="1" value="{{old("mezuniyetyili")}}" />
                                @error('mezuniyetyili')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Parola</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Tekrar Parola</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Üye Ol
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
