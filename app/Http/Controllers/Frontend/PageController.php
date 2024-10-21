<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function urunler(Request $request, $slug = null)
{
    $category = $request->segment(1) ?? null;
    $sizes = !empty($request->sizes) ? explode(',', $request->sizes) : null;
    $colors = !empty($request->color) ? explode(',', $request->color) : null;
    $startprice = $request->input('min', null);
    $endprice = $request->input('max', null);
    $order = $request->input('order', 'id');
    $sort = $request->input('sort', 'desc');

    $products = Product::where('status', '1')
        ->select(['id', 'name', 'slug', 'size', 'color', 'price', 'category_id', 'image'])
        ->where(function ($q) use ($sizes, $colors, $endprice, $startprice) {
            if (!empty($sizes)) {
                $q->whereIn('size', $sizes);
            }
            if (!empty($colors)) {
                $q->whereIn('color', $colors);
            }
            if (!empty($startprice) && !empty($endprice)) {
                $q->whereBetween('price', [$startprice, $endprice]);
            }
        })
        ->with('category:id,name,slug')
        ->whereHas('category', function ($q) use ($slug) {
            if (!empty($slug)) {
                $q->where('slug', $slug);
            }
        });

    $sizelists = Product::where('status', '1')->groupBy('size')->pluck('size')->toArray();
    $colors = Product::where('status', '1')->groupBy('color')->pluck('color')->toArray();

    $products = $products->orderBy($order, $sort)->paginate(10);
    $maxprice = Product::max('price');

    return view('frontend.pages.product', compact('products', 'maxprice', 'sizelists', 'colors'));
}

    public function indirimdekiurunler()
    {
        return view('frontend.pages.products');
    }

    public function urundetay($slug = null)
    {
        $products = Product::whereSlug($slug)->where('status', '1')->firstOrFail();
        $product = Product::where('id', '!=', $products->id)
            ->where('category_id', $products->category_id)
            ->where('status', '1')
            ->limit(6)
            ->get();

        return view('frontend.pages.products', compact('products', 'product'));
    }


    public function hakkimizda()
    {
        $about = About::where('id', 1)->first();
        return view('frontend.pages.about', compact('about'));
    }

    public function iletisim()
    {
        return view('frontend.pages.contact');
    }
}
