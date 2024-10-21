<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('category:id,cat_ust,name')->get();
        return view('backend.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.pages.category.edit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')) {
            $resim = $request->file('image');
            $dosyadi = time(). '-'.Str::slug($request->name).'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('img/kategori'),$dosyadi);
         }

        Category::create([
            'name' => $request->name,
            'cat_ust' => $request->cat_ust,
            'content' => $request->content,
            'status' => $request->status,
            'image' => $dosyadi ?? 'NULL',
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
        $category = Category::where('id', $id)->first();
        $categories = Category::get();
        return view('backend.pages.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->hasFile('image')) {
            $resim = $request->file('image');
            $dosyadi = time(). '-'.Str::slug($request->name);'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('img/kategori'),$dosyadi);
         }
        Category::where('id', $id)->update([
            'name' => $request->name,
            'cat_ust' => $request->cat_ust,
            'content' => $request->content,
            'status' => $request->status,
            'image' => $dosyadi ?? 'NULL',
        ]);

        return back()->withSuccess('Başarılı bir şekilde güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $category = Category::where('id', $request->id)->firstOrFail();
        dosyasil($category->image);
        $category->delete();
        return response(['error' => false, 'message' => 'Başarıyla silindi.']);
    }

    public function status(Request $request) {
        $update = $request->statu;
        $updatecheck = $update == "false" ? '0' : '1';

        Category::where('id', $request->id)->update(['status' => $updatecheck]);
        return response(['error' => false, 'status' => $updatecheck]);
    }
}
