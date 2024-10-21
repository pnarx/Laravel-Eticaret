@extends('backend.layout.app')

@section('content')



<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">İletişim Bilgileri</h4>

          @if (session()->get('success'))

          <div class="alert alert-success">
            {{session()->get('success')}}
          </div>
          @endif
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Ad Soyad</th>
                  <th>Email</th>
                  <th>Konu</th>
                  <th>Mesaj</th>
                  <th>Durum</th>
                  <th>IP</th>
                  <th>Edit</th>

                </tr>
              </thead>
              <tbody>
                @if (!empty($contacts) && $contacts->count() > 0)
                @foreach ($contacts as $contact)
                @csrf
                <tr class="item" item-id="{{$contact->id}}">

                  <td>{{$contact->name}}</td>
                  <td>{{$contact->email ?? ''}}</td>
                  <td>{{$contact->sucject}}</td>
                  <td>{{$contact->message}}</td>


                  <td>
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" class="durum" data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="danger" {{$contact->status=='1' ? 'checked' : ''}} data-toggle="toggle">

                        </label>
                      </div>
                  </td>
                  <td>{{$contact->ip}}</td>

                  <td class= "d-flex">
                    <a href="{{route('panel.contact.edit',$contact->id)}}" class="btn btn-primary mr-2">Düzenle</a>

                   {{--<form action="{{route('panel.contact.destroy',$contact->id)}}" method="POST">
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
    type: "DELETE", // Change to DELETE
    url: "{{ route('panel.contact.destroy') }}",
    data: {
        id: id,
    },
    success: function(response) {
        if (response.error == false) {
            item.remove();
            alertify.success(response.message);
        } else {
            alertify.error('bir hata oluştu.');
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
        url: "{{ route('panel.contact.destroy') }}",
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
