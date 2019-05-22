@extends('layouts.index')
@section("content")
    <form action="{{isset($internship)?route("internship.update",$internship->id):route("internship.store")}}" method="post">
        @csrf
        @method(isset($internship)?"put":"post")
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
                    <h3>İlan Başlığı</h3>
                    <input required name="baslik" class="form-control" placeholder="İlan Başlığı" value="{{old("baslik",$internship->baslik??"")}}">
                </div>
                @error('baslik')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <h3>Şirket</h3>
                    <input required name="sirket" class="form-control" placeholder="Şirket" value="{{old("sirket",$internship->sirket??"")}}">
                </div>
                @error('sirket')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <h3>Açıklama</h3>
                    <textarea required name="aciklama" id="aciklama" class="form-control" placeholder="Açıklama" rows="4">{{old("aciklama",$internship->aciklama??"")}}</textarea>
                </div>
                @error('aciklama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if(auth()->user()->admin && isset($internship))
                    <input type="hidden" name="aktif" id="onayli" value="{{$internship->aktif}}">
                    <b>Onaylı:</b>
                    <a class="btn btn-success btn-sm" {!! $internship->aktif?'"':'style="display:none"'!!} id="evet">Evet</a>
                    <a class="btn btn-danger btn-sm" {!! $internship->aktif?'style="display:none"':''!!} id="hayir">Hayır</a>
                    @section('footer')
                        <script>
                            $("#hayir,#evet").click(function () {
                                $("#evet,#hayir").toggle();
                                let aktif=$("#onayli").val();
                                $("#onayli").val(aktif==1?0:1);
                            });
                        </script>
                    @endsection
                @endif
                <button class="btn btn-success pull-right">{{isset($internship)?"Güncelle":"Oluştur"}}</button>
            </div>
        </div>
    </form>
@endsection