@extends('frontend.layout.layout')

@section('content')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{route('anasayfa')}}">Anasayfa</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">İletişim</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="h3 mb-3 text-black">İletişim Formu</h2>
        </div>
        <div class="col-md-7">
          @if (session()->get('success'))

          <div class="alert alert-success">
            {{session()->get('success')}}
          </div>
          @endif

          @if (count($errors))
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger">{{$error}} </div>
          @endforeach

          @endif
          <form action="{{route('iletisim.kaydet')}}" method="post">
            @csrf

            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="name" class="text-black">Ad Soyad<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>

              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="email" class="text-black">E-mail <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="">
                </div>
                <div class="col-md-6">
                    <label for="sucject" class="text-black">Subject <span class="text-danger">*</span></label>
                    <input type="sucject" class="form-control" id="sucject" name="sucject" placeholder="">
                  </div>
              </div>


              <div class="form-group row">
                <div class="col-md-12">
                  <label for="message" class="text-black">Mesajınız </label>
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Gönder">
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-5 ml-auto">
          <div class="p-4 border mb-3">
            <span class="d-block text-primary h6 text-uppercase">Adres</span>
            <p class="mb-0">{{$settings['Adres']}}</p>
          </div>
          <div class="p-4 border mb-3">
            <span class="d-block text-primary h6 text-uppercase">E-mail Adresi</span>
            <p class="mb-0">{{$settings['E-Mail']}}</p>
          </div>
          <div class="p-4 border mb-3">
            <span class="d-block text-primary h6 text-uppercase">Telefon</span>
            <p class="mb-0">{{$settings['Telefon']}}</p>
          </div>

        </div>
      </div>
    </div>
  </div>


@endsection
