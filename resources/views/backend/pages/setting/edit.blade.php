@extends('backend.layout.app')

@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Site Ayarları</h4>
            @if ($errors)
            @foreach ($errors->all() as $error )
            <div class="alert alert-danger">
                {{$error}}
            </div>
            @endforeach

            @endif
            @if (session()->get('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
            @endif
           @if (!empty($setting->id))
           @php
                $routelink = route('panel.setting.update',$setting->id);
           @endphp
           @else
           @php
                  $routelink = route('panel.setting.store');

           @endphp

           @endif
            <form action="{{$routelink}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                @csrf
                @if (!empty($setting->id))
                @method('PUT')

                @endif

                <select name="set_type" id="" class="form-control">
                    <option value=""> Tür Seçiniz</option>
                    <option value="ckeditor" {{isset($setting->set_type) && $setting->set_type == 'ckeditor' ? 'selected' : ''}}>Ckeditor</option>
                    <option value="file"{{isset($setting->set_type) && $setting->set_type == 'file' ? 'selected' : ''}}>File </option>
                    <option value="image"{{isset($setting->set_type) && $setting->set_type == 'image' ? 'selected' : ''}}>Resim</option>
                    <option value="email"{{isset($setting->set_type) && $setting->set_type == 'email' ? 'selected' : ''}}>Email</option>
                    <option value="text"{{isset($setting->set_type) && $setting->set_type == 'text' ? 'selected' : ''}}>Text</option>
                    <option value="copyright"{{isset($setting->set_type) && $setting->set_type == 'copyright' ? 'selected' : ''}}>copyright</option>

                </select>


              <div class="form-group">
                <label for="name">Başlık</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$setting->name ?? ''}}" placeholder="setting Başlık">
              </div>
              <div class="form-group">
                <label for="data">Açıklama</label>
                <textarea  class="form-control" id="data" name="data" placeholder="setting Açıklama" rows="3"> {{!! $setting->data ?? '' !!}}</textarea>
              </div>



              <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
              <button class="btn btn-light">Geri Dön</button>
            </form>
          </div>
        </div>
      </div>
</div>



  @endsection
