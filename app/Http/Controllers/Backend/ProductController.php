<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category:id,cat_ust,name')->orderBy('id','desc')->paginate(20);
        return view('backend.pages.product.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.pages.product.edit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        if($request->hasFile('image')) {
            $resim = $request->file('image');
            $dosyadi = time(). '-'.Str::slug($request->name).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('img/urun'),$dosyadi);
         }

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'status' => $request->status,
            'image' => $dosyadi,
            'short_text' => $request->short_text,
            'price' => $request->price,
            'size' => $request->size,
            'color' => $request->color,
            'qty' => $request->qty,
        ]);

        return back()->withSuccess('Başarılı bir şekilde oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        return view('backend.pages.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $dosyadi = $product->image;

        if($request->hasFile('image')) {
            $resim = $request->file('image');
            $dosyadi = time(). '-'.Str::slug($request->name).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('img/urun'),$dosyadi);
         }

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'status' => $request->status,
            'image' => $dosyadi,
            'short_text' => $request->short_text,
            'price' => $request->price,
            'size' => $request->size,
            'color' => $request->color,
            'qty' => $request->qty,
        ]);

        return back()->withSuccess('Başarılı bir şekilde güncellendi.');
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        if ($product->image) {
            unlink(public_path('img/urun/' . $product->image));
        }
        $product->delete();
        return response()->json(['error' => false, 'message' => 'Başarıyla silindi.']);
    }

    public function status(Request $request)
    {
        $updatecheck = $request->statu == "false" ? '0' : '1';
        Product::where('id', $request->id)->update(['status' => $updatecheck]);
        return response(['error' => false, 'status' => $updatecheck]);
    }
}
