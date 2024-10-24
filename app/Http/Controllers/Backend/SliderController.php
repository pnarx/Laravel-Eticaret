<?php

namespace App\Http\Controllers\Backend;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.pages.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.slider.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        if($request->hasFile('image')) {
           $resim = $request->file('image');
           $dosyadi = time(). '-'.Str::slug($request->name).'.'.$resim->getClientOriginalExtension();
           $resim->move(public_path('img/slider'),$dosyadi);
        }

        Slider::create([
            'name'=> $request->name,
            'content'=> $request->content,
            'link'=> $request->link,
            'sttaus'=> $request->status,
            'image'=> $dosyadi ?? 'NULL',

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
       $slider = Slider::where('id',$id)->first();
       return view('backend.pages.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->hasFile('image')) {
            $resim = $request->file('image');
            $dosyadi = time(). '-'.Str::slug($request->name);'.'.$resim->getClientOriginalExtension();
            $resim->move(public_path('img/slider'),$dosyadi);
         }

         Slider::where('id',$id)->update([
             'name'=> $request->name,
             'content'=> $request->content,
             'link'=> $request->link,
             'status'=> $request->status,
             'image' => $dosyadi ?? 'NULL',

         ]);
         return back()->withSuccess('Başarılı bir şekilde güncellendi.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $slider = Slider::where('id',$request->id)->firstOrFail();

      dosyasil($slider->image);


        $slider->delete();
        return response(['error'=>false,'message'=>'Başarıyla Slindi.']);


    }

    public function status(Request $request) {
        $update = $request->statu;
        $updatecheck = $update == "false" ? '0' : '1';

        Slider::where('id', $request->id)->update(['status' => $updatecheck]);
        return response(['error' => false, 'status' => $updatecheck]);
    }
}
