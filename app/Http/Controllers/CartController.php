<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\myCart;
use Auth;
class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addCart(){
        $r=request();
        $add=myCart::create([
            'productID'=>$r->id,
            'quantity'=>$r->quantity,
            'userID'=>Auth::id(),
            'orderID'=>''
        ]);
        return redirect()->route('myCart');
    }

    public function view(){
        $cart=DB::table('my_carts')
        ->leftjoin('products','my_carts.id','=','products.id')
        ->select('my_carts.quantity as cartQty','my_carts.id as cid','products.*')
        ->where('my_carts.userID','=',Auth::id())
        ->where('my_carts.orderID','=','')
        ->get();
        return view('myCart')->with('products',$cart);
    }
}
