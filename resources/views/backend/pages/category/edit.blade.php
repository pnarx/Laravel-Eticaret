@extends('backend.layout.app')

@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Kategori</h4>
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
           @if (!empty($category->id))
           @php
                $routelink = route('panel.category.update',$category->id);
           @endphp
           @else
           @php
                  $routelink = route('panel.category.store');

           @endphp

           @endif
            <form action="{{$routelink}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                @csrf
                @if (!empty($category->id))
                @method('PUT')

                @endif

                <div class="form-group">
                    <label>Resim</label>
                    <input type="file" name="image"  class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Yükle</button>
                      </span>
                    </div>
                  </div>
              <div class="form-group">
                <label for="name">Başlık</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->name ?? ''}}" placeholder="Slider Başlık">
              </div>
              <div class="form-group">
                <label for="content">İçerik</label>
                <textarea type="text" class="form-control" id="content" name="content" rows="3">{{$category->content ?? ''}}</textarea>
              </div>
              <div class="form-group">
                <label for="name">Kategori</label>
                <select name="cat_ust" id="" class="form-control">
                    <option value="">Kategori Seç</option>
                    @if ($categories)
                    @foreach ($categories as $alt)
                    <option value="{{$alt->id}}" {{isset($category) && $category->cat_ust == $alt->id ? 'selected' : ''}}>{{$alt->name}}</option>

                    @endforeach

                    @endif
                </select>
              </div>

              <div class="form-group">
                <label for="status">Durum</label>
                @php
                    $status = $contact->status ?? '1';
                @endphp
                <select id="status" name="status" class="form-control">
                    <option value="0" {{ $status == '0' ? 'selected' : '' }}>Pasif</option>
                    <option value="1" {{ $status == '1' ? 'selected' : '' }}>Aktif</option>
                </select>
            </div>

              <button type="submit" class="btn btn-primary mr-2">Ekle</button>
              <button class="btn btn-light">Geri Dön</button>
            </form>
          </div>
        </div>
      </div>
</div>



  @endsection
