<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index() {

        $cartItem = session ('cart',[]);
        $totalPrice =0;

        foreach ( $cartItem as $cart){
            $totalPrice += $cart['price'] * $cart['qty'];
        }

        if(session()->get('coupon_code')) {
            $kupon = Coupon::where('name',session()->get('coupon_code'))->where('status','1')->first();
            $kuponprice = $kupon->price ?? 0 ;
            $kuponcode = $kupon->name ?? '' ;

            $newtotalPrice = $totalPrice - $kuponprice;
        }else {
            $newtotalPrice = $totalPrice;
        }
        session()->put('total_price',$newtotalPrice);

        return view('frontend.pages.cart',compact('cartItem'));


    }
    public function add(Request $request) {


        $productID=$request->product_id;
        $qty = $request->qty;
        $size=$request->size;
        $urun = Product::find($productID);
        if(!$urun) {
            return back()->withError('Ürün Bulunamadı.');
        }
        $cartItem =session('cart',[]) ;
        if(array_key_exists($productID,$cartItem)){
            $cartItem[$productID]['qty']+= $qty;
        }else{
            $cartItem[$productID]=[
                'image' => $urun->image ?? 'default-image.jpg',
                'name'=>$urun->name,
                'price'=>$urun->price,
                'qty'=>$urun->$qty ?? 1,
                'size'=>$urun->$size,
            ];
        }
        session(['cart'=>$cartItem]);

        return back()->withSuccess('Ürün Sepete Eklendi');
    }
    public function remove(Request $request) {
        $productID = $request->product_id;
        $cartItem = session('cart',[]);
        if(array_key_exists($productID,$cartItem)){
            unset($cartItem[$productID]);
        }
        session(['cart'=>$cartItem]);
        return back()->withSuccess('Başarıyla Sepetten Kaldırıldı.');


    }

    public function couponcheck(Request $request) {


        $cartItem = session('cart',[]);
        $totalPrice =0;
        foreach ( $cartItem as $cart){
            $totalPrice += $cart['price'] * $cart['qty'];
        }


        $kupon = Coupon ::where('name',$request->coupon_name)->where('status','1')->first();
        $kuponprice = $kupon->price ?? 0;
        $kuponcode = $kupon->name ?? '';

        $totalPrice = $totalPrice - $kuponprice;
        $newtotalPrice = $totalPrice - $kuponprice;


        session()->put('total_price',$newtotalPrice);
        session()->put('coupon_code',$kuponcode);


        return back()->withSuccess('Kupon uygulandı')->with('newtotalPrice');

    }


}
