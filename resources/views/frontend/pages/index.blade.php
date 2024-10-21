
@extends('frontend.layout.layout ')
@section('content')

    @if (!@empty($slider))

    <div class="site-blocks-cover" style="background-image: url({{ asset('img/slider/' . ($slider->image ?? 'hero_1.jpg')) }});" data-aos="fade">
        <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2">{{$slider->name ?? 'veriyok'}}</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4">{{$slider->content ?? ''}}</p>
              <p>
                <a href="{{$slider->link ?? ''}}" class="btn btn-sm btn-primary">Ürünlerimiz</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endif
    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
              <div class="icon mr-4 align-self-start">
                <span class="{{$about->text_1_icon}}"></span>
              </div>
              <div class="text">
                <h2 class="text-uppercase">{{$about->text_1}}</h2>
                <p>{{$about->text_1_content}}</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
              <div class="icon mr-4 align-self-start">
                <span class="{{$about->text_2_icon}}"></span>
              </div>
              <div class="text">
                <h2 class="text-uppercase">{{$about->text_2}}</h2>
                <p>{{$about->text_2_content}}</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
              <div class="icon mr-4 align-self-start">
                <span class="{{$about->text_3_icon}}"></span>
              </div>
              <div class="text">
                <h2 class="text-uppercase">{{$about->text_3}}</h2>
                <p>{{$about->text_3_content}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row">
            @if (!empty($categories))

            @foreach ($categories->where('cat_ust',null) as $category)
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                <a class="block-2-item" href="{{route($category->slug.'urunler')}}">
                  <figure class="image">
                    <img src="{{asset($category->image)}}" alt="" class="img-fluid">
                  </figure>
                  <div class="text">
                    <span class="text-uppercase">Giyim</span>
                    <h3>{{$category->name}}</h3>
                  </div>
                </a>
              </div>
            @endforeach
            @endif
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Ürünlerimiz</h2>
          </div>
        </div>
        <div class="row">
            @if (!empty($products) && $products->count() > 0)
              <?php $counter = 0; ?>
              @foreach ($products as $product)
                <?php if ($counter < 3) : ?>
                  <div class="col-md-4">

                    <div class="item">
                      <div class="block-4 text-center">
                        <figure class="block-4-image">
                          <img src="{{asset('img/urun/' . ($product->image ?? 'hero_1.jpg'))}}" alt="" class="img-fluid" />
                        </figure>
                        <div class="block-4-text p-4">
                          <h3><a href="{{route('urundetay',$product->slug)}}">{{$product->name}}</a></h3>
                          <p class="mb-0">{{$product->short_text}}</p>
                          <p class="text-primary font-weight-bold">{{number_format($product->price,0)}}</p>

                          <form id="addForm" method="POST">
                            @csrf
                            <input type="hidden" name="size" value="{{$product->size}}">
                            <input type="hidden" name="coupon_code" value="{{request()->segment(1) == 'tumurunler-indirim' ? 'tumurun' : ''}}">
                            <button type="submit" class="buy-now btn btn-sm btn-primary">Sepete Ekle</button>
                          </form>
                        </div>
                      </div>
                    </div>

                  </div>
                <?php $counter++; ?>
                <?php endif; ?>
              @endforeach
            @endif
          </div>

      </div>
    </div>

    <div class="site-section block-8">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>{{$about->name}}</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 mb-5">
            <a href="#"><img src="{{ asset('img/about/' . ($about->image ?? 'hero_1.jpg')) }}" alt="Image placeholder" class="img-fluid rounded"></a>
          </div>
          <div class="col-md-12 col-lg-5 text-center pl-md-5">
            <h2><a href="#">{{$about->name}}</a></h2>
            <p>{{$about->content}}</p>
            <p><a href="#" class="btn btn-primary btn-sm">İletişim</a></p>
          </div>
        </div>
      </div>
    </div>
@endsection
