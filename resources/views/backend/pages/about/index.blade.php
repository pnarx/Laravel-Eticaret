@extends('backend.layout.app')

@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Hakkımızda</h4>
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

            <form action="{{route('panel.about.update')}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                @csrf


                <div>
                    <label>Resim</label>
                    <div class="input-group col-xs-4"  style="max-width: 90px; max-height:90px;">

                        <img src="{{asset('img/about/' . ($about->image ?? 'hero_1.jpg')) }}" alt="About Image" class="img-thumbnail">
                    </div>
                </div>

                <div class="form-group">
                    <label>Resim</label>
                    <input type="file" name="image"   class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" value="{{$about->image ?? ''}}" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Güncelleme</button>
                      </span>
                    </div>
                  </div>
              <div class="form-group">
                <label for="name">Başlık</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$about->name ?? ''}}" placeholder="Hakkımzıda Başlık">
              </div>
              <div class="form-group">
                <label for="editor">Açıklama</label>
                <textarea  class="form-control" id="editor" name="content" placeholder="Hakkımzıda Açıklama" rows="3"> {{!! $about->content ?? '' !!}}</textarea>
              </div>
              <div class="form-group">
                <label for="text_1_icon">İCON1</label>
                <input type="text" class="form-control" id="text_1_icon" name="text_1_icon" value="{{$about->text_1_icon ?? ''}}" placeholder="Link">
              </div>


              <div class="form-group">
                <label for="text_1">TEXT</label>
                <input type="text" class="form-control" id="text_1" name="text_1" value="{{$about->text_1 ?? ''}}" placeholder="Link">
              </div>


              <div class="form-group">
                <label for="text_1_content">Text 1 Content</label>
                <textarea  class="form-control" id="text_1_content" name="text_1_content" placeholder="Hakkımzıda Açıklama" rows="3"> {{!! $about->text_1_content ?? '' !!}}</textarea>
              </div>
              <div class="form-group">
                <label for="text_2_icon">İCON2</label>
                <input type="text" class="form-control" id="text_2_icon" name="text_2_icon" value="{{$about->text_2_icon ?? ''}}" placeholder="Link">
              </div>


              <div class="form-group">
                <label for="text_2">TEXT 2</label>
                <input type="text" class="form-control" id="text_2" name="text_2" value="{{$about->text_2 ?? ''}}" placeholder="Link">
              </div>


              <div class="form-group">
                <label for="text_2_content">Text 2 Content</label>
                <textarea  class="form-control" id="text_2_content" name="text_2_content" placeholder="Hakkımzıda Açıklama" rows="3"> {{!! $about->text_2_content ?? '' !!}}</textarea>
              </div>

              <div class="form-group">
                <label for="text_3_icon">İCON3</label>
                <input type="text" class="form-control" id="text_3_icon" name="text_3_icon" value="{{$about->text_3_icon ?? ''}}" placeholder="Link">
              </div>


              <div class="form-group">
                <label for="text_3">TEXT 3</label>
                <input type="text" class="form-control" id="text_3" name="text_3" value="{{$about->text_3 ?? ''}}" placeholder="Link">
              </div>


              <div class="form-group">
                <label for="text_3_content">Text 3 Content</label>
                <textarea  class="form-control" id="text_3_content" name="text_3_content" placeholder="Hakkımzıda Açıklama" rows="3"> {{!! $about->text_3_content ?? '' !!}}</textarea>
              </div>

              <div class="form-group">
                <label for="status">Durum</label>
                @php
                    $status = $about->status ?? '1';
                @endphp
                <select  id="status" name="status" class="form-control">
                    <option value="{{$status == '0' ? 'seleceted' : ''}}" >Pasif</option>
                    <option value="{{$status == '1' ? 'seleceted' : ''}}"   > Aktif</option>

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
