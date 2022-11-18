<?php

namespace App\Http\Controllers;

use App\Product;
use App\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store)
    {
        //
        return view('products.create',compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Store $store)
    {
        //
        $validateDate = $request->validate([
            'name'=>'required|min:5',
            'price'=>'required',
            'image1'=>'mimes:jpeg,bmp,png,jpg|max:3000',
            'image2'=>'mimes:jpeg,bmp,png,jpg|max:3000'
        ]);

        $path=array();
        if($request->hasFile('image1'))
            $path[] = '/storage/'.$request->file('image1')->store('productsImages',['disk'=>'public']);
        if($request->hasFile('image2'))
            $path[] = '/storage/'.$request->file('image2')->store('productsImages',['disk'=>'public']);

        $newProduct = new Product(); 
        $newProduct->name=$request->name; 
        $newProduct->price=$request->price; 
        $newProduct->images=$path;
        $store->product()->save($newProduct);
        return redirect('/stores/'.$store->id.'/ideas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('products.show',compact('product'));
    }

    public function confirmation(Product $product){
        if($product->store->user_id != auth()->user()->id)
            return view('customError');
        $store = $product->store_id;
        return view('products.delete',compact('product','store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if($product->store->user_id != auth()->user()->id)
            return view('customError');
        $store = $product->store;
        return view('products.edit',compact('product','store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        //
        if($product->store->user_id != auth()->user()->id)
            return view('customError');
        
       $validateDate = $request->validate([
        'name'=>'required|min:5',
        'price'=>'required|min:1',
        'image1'=>'mimes:jpeg,bmp,png,jpg|max:3000',
        'image2'=>'mimes:jpeg,bmp,png,jpg|max:3000'
        ]);

        $path=$product->images;
        if($request->hasFile('image1'))
            $path[0] = '/storage/'.$request->file('image1')->store('productsImages',['disk'=>'public']);
        if($request->hasFile('image2'))
            $path[1] = '/storage/'.$request->file('image2')->store('productsImages',['disk'=>'public']);

        $product->name=$request->name; 
        $product->price=$request->price; 
        $product->images=$path;
        $product->save();
        return redirect('/stores/'.$product->store_id .'/ideas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Store $store)
    {
        //
        if($product->store->user_id!= auth()->user()->id)
            return view('customError');

        $product->delete();
        return redirect('/stores/'.$product->store_id .'/ideas');
    }
}
