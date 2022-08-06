<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id        = auth()->id();  
        //$arrCart        = Cart::where("user_id", "=", $user_id)->orderBy('amount', 'DESC')->get();        
        $data           = DB::table('carts')
                          ->leftJoin('products', 'carts.product_id', '=', 'products.id')
                          //->where('carts.user_id', '=',$user_id)
                          ->orderBy('carts.created_at', 'DESC')
                          ->get();
        return view('products.cart',['arrCart'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function buy_product($id)
    {
        $Product    = Product::find($id);
        if($Product)
        {
            $user_id            =auth()->id();            
            $objM               = new Cart;        
            $objM->user_id      = 0;
            $objM->product_id   = $id;
            $objM->amount       = $Product->amount;    
            $objM->item_count   = 1;
            $objM->total_amount = $Product->amount;           
            if($objM->save())
            {
                return redirect('/cart/list')->with('message', 'Data Saved Successfully!.');            
            }
            else
            {   
                return redirect('/cart')->with('emessage', 'Some unknown error while saving the data!,Please try later.!.'); 
            }           
        }
        else
          return redirect('/courses')->with('emessage', 'Invalid course selected,Please try later!.');  
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
