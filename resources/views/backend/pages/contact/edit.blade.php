@extends('backend.layout.app')

@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">İletişim</h4>
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

            <form action="{{route('panel.contact.update',$contact->id)}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                @csrf

                @method('PUT')

              <div class="form-group">
                <label for="name">Ad Sotad</label>
                <input type="text" class="form-control" id="name" name="name" readonly value="{{$contact->name ?? ''}}" placeholder="contact Başlık">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <textarea  class="form-control" id="mail" readonly rows="3"> {{!! $contact->email ?? '' !!}}</textarea>
              </div>
              <div class="form-group">
                <label for="sucject">Konum</label>
                <textarea  class="form-control" id="sucject" readonly rows="3"> {{!! $contact->sucject ?? '' !!}}</textarea>
              </div>
              <div class="form-group">
                <label for="message">Mesaj</label>
                <input type="text" class="form-control" id="message" readonly name="message" value="{{$contact->message ?? ''}}" placeholder="Link">
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


              <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
              <button class="btn btn-light">Geri Dön</button>
            </form>
          </div>
        </div>
      </div>
</div>



  @endsection
