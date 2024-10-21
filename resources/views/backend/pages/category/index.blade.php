@extends('backend.layout.app')

@section('content')



<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Kategori içerik</h4>
          <p class="card-description">
            <a href="{{route('panel.category.create')}}" class="btn btn-primary">Yeni</a>
          </p>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Resim</th>
                  <th>Başlık</th>
                  <th>Açıklama</th>
                  <th>Link</th>
                  <th>Status</th>

                </tr>
              </thead>
              <tbody>
                @if (!empty($categories) && $categories->count() > 0)
                @foreach ($categories as $category)
                <tr class="item" item-id="{{$category->id}}">
                    <td class="dy-1" >
                        <img src="{{asset('img/kategori/' . ($category->image ?? 'hero_1.jpg')) }}" alt="image"/>
                    </td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->category->name ?? ''}}</td>

                  <td>
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" class="durum" data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="danger" {{$category->status=='1' ? 'checked' : ''}} data-toggle="toggle">

                        </label>
                      </div>
                  </td>
                  <td class= "d-flex">
                    <a href="{{route('panel.category.edit',$category->id)}}" class="btn btn-primary mr-2">Düzenle</a>

                   {{--<form action="{{route('panel.slider.destroy',$slider->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> Sil </button>

                </form> --}}

                <button type="button" class="silBtn btn btn-danger"> Sil </button>

                  </td>


                </tr>
                @endforeach

                @endif


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('customjs')
<script>
$(document).on('change', '.durum', function(e) {
    var item = $(this).closest('.item');
    var id = item.attr('item-id');
    var statu = $(this).prop('checked') ? '1' : '0';

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "{{ route('panel.category.status') }}",
        data: {
            id: id,
            statu: statu
        },
        success: function(response) {
            if (response.status == "1") {
                alertify.success("Durum Aktif Edildi");
            } else {
                alertify.error("Durum Pasif Edildi");
            }
        }
    });
});

$(document).on('click', '.silBtn', function(e) {

    e.preventDefault();
    var item = $(this).closest('.item');
    id = item.attr('item-id');

    alertify.confirm("İşleme devam ediliyor","Silmek istediğine emin misin?",
  function(){

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "DELETE",
        url:"{{route('panel.category.destory')}}",
        data: {
            id: id,

        },
        success: function(response) {
            if (response.error == false) {
                item.remove();
                alertify.success(response.message);

            }
            else{
                alertify.error('bir hata oluştu.');
            }
        }
    });
  },
  function(){
    alertify.error('İptal edildi');
  });
});

</script>
@endsection
