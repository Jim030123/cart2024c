<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
class ProductController extends Controller
{
    public function add(){
        $r=request(); //get all data from html input
        $addProduct=Product::create([
            'name'=>$r->productName,
            'description'=>$r->productDescription,
            'quantity'=>$r->productQuantity,
            'price'=>$r->productPrice,
            'categoryID'=>'1',
            'image'=>'empty.jpg',
        ]);
        return redirect()->route('showProduct');
    }

    public function show(Request $request){
        $keyword = $request->input('keyword');
        if ($keyword) {
            $viewProduct = Product::where('name', 'LIKE', "%{$keyword}%")
                                  ->orWhere('description', 'LIKE', "%{$keyword}%")
                                  ->get();
        } else {
            $viewProduct = Product::all();
        }
        return view('showProduct')->with('products', $viewProduct)->with('keyword', $keyword);
    }

    public function item()
    {
        return view('items'); // Serves the Blade view
    }

    public function fetchItems()
    {
        $items = Product::all();
        return response()->json($items);
    }

    public function edit($id){
        $products=Product::all()->where('id',$id);
        //select * from products where id='$id'
        return view('editProduct')->with('products',$products);
    }

    public function update(){
        $r=request();
        $product=Product::find($r->id);
        if($r->file('productImage')!=''){
            $image=$r->file('productImage');
            $image->move('images',$image->getClientOriginalName());
            $product->image=$image->getClientOriginalName();
        }
        $product->name=$r->productName;
        $product->description=$r->productDescription;
        $product->price=$r->productPrice;
        $product->quantity=$r->productQuantity;
        $product->save();//update products set name='$productname', price='$ProductPrice'....where id='$id'
        return redirect()->route('showProduct');
    }

    public function delete($id){
        $product=Product::find($id);
        $product->delete();//delete from products where id='$id'
        return redirect()->route('showProduct');
    }

    public function detail($id){
        $products=Product::all()->where('id',$id);
        //select * from products where id='$id'
        return view('productDetail')->with('products',$products);
    }

    public function viewProducts()
    {
        $products = Product::all();
        return view('viewProducts', compact('products'));
    }
}
