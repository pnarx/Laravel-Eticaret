
@if (!empty($products) && $products->count() > 0)
@foreach ($products as $product)
<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
    <div class="block-4 text-center border">
    <figure class="block-4-image">
        <a href="{{route('urundetay',$product->slug)}}">


            <img src="{{asset('img/urun/' . ($product->image ?? 'hero_1.jpg'))}}"  alt="" class="img-fluid" ></img>

           </a>
    </figure>
    <div class="block-4-text p-4">
        <h3><a href="{{route('urundetay',$product->slug)}}">{{$product->name}}</a></h3>
        <p class="mb-0">{{$product->short_text}}</p>
        <p class="text-primary font-weight-bold">{{number_format($product->price,0)}}</p>



        <form id="addForm" method="POST">
            @csrf
            <input type="hidden" name="size" value="{{$product->size}}">
            <input type="hidden" name="coupon_code" value="{{request()->segment(1) == 'tumurunler-indirim' ? 'tumurun' : ''}}">
            <p><button type="submit"  class="buy-now btn btn-sm btn-primary">Sepete Ekle</button></p>

        </form>
    </div>
    </div>
</div>
@endforeach
@endif
