<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data           = Product::all();
        return view('items.list',['arrProducts'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $Request)
    {
        $validatedData  = $Request->validate(
                            [
                                'item_name'         => 'required',
                                'amount'            => 'required|numeric|between:1,99999999999999', 
                                'stock'             => 'required|integer',                               
                                'item_status'       => 'required',  
                                'image'             => 'required|image|mimes:jpg,png,jpeg|max:2048',
                            ],
                            [
                                'item_name.required'        => 'Item Name is required',
                                'amount.required'           => 'Item price is required', 
                                'stock.required'            => 'Stock is required',                             
                                'item_status.required'      => 'Status is required',
                                'image.required'            => 'Valid Image is required',
                            ]);
        $product                    = new Product();
        $product->item_name         = $Request->input('item_name');
        $product->description       = $Request->input('description');        
        $product->amount            = $Request->input('amount');
        $product->stock             = $Request->input('stock');
        $product->item_status       = $Request->input('item_status'); 
        if($Request->file('image'))
        {
            $file           = $Request->file('image');
            $filename       = date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('public/item_images'), $filename);
            //$data['image']  = $filename;
            $product->image = $filename;
        }
        $product->save();
        //$product        = Product::create($Request->all());
        return redirect('/admin/products')->with('message', 'Data Saved Successfully!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data           = Product::find($id);
        return view('items.edit',['arrProduct'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $Request, $id)
    {
        $validatedData  = $Request->validate(
                            [
                                'item_name'         => 'required',
                                'amount'            => 'required|numeric|between:1,99999999999999', 
                                'stock'             => 'required|integer',                               
                                'item_status'       => 'required',  
                                //'image'             => 'required|image|mimes:jpg,png,jpeg|max:2048',
                            ],
                            [
                                'item_name.required'        => 'Item Name is required',
                                'amount.required'           => 'Item price is required', 
                                'stock.required'            => 'Stock is required',                             
                                'item_status.required'      => 'Status is required',
                                //'image.required'            => 'Valid Image is required',
                            ]);
        $product                    = Product::find($id);
        if($Request->file('image'))
        {
            $file           = $Request->file('image');
            $filename       = date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('public/item_images'), $filename);
            //$data['image']  = $filename;
            $image          = $filename;
        }
        else
            $image          = $product->image;        
        $product->item_name         = $Request->input('item_name');
        $product->description       = $Request->input('description');
        $product->image             = $image;
        $product->amount            = $Request->input('amount');
        $product->stock             = $Request->input('stock');
        $product->item_status       = $Request->input('item_status');       
        $product->update();
        return redirect('/admin/products')->with('message', 'Data Updated Successfully!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product=Product::find($id);
        if($Product)
        $Product->delete(); 
        return redirect('/admin/products')->with('message', 'Data Deleted Successfully!.');
    }


    /**
     * To list the active courses in the front end.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function product_list()
    {
        $arrProducts = DB::table('products')->where('item_status', '=','Active')->get();    
        return view('products.list',['arrProducts'=>$arrProducts]);
    }


}
