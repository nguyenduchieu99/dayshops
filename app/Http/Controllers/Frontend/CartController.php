<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        # code...
        if (Auth::check()) 
        {
                $pord_check = Product::where('id',$product_id)->first();

                if ($pord_check)
                {
                    if (Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()) 
                    {
                        return response()->json(['status'=> $pord_check->name." Already add to cart"]);
                    } 
                    else
                    {
                        $cartItem = new Cart();
                        $cartItem->prod_id  = $product_id;
                        $cartItem->user_id  = Auth::id();
                        $cartItem->prod_qty  = $product_qty;
                        $cartItem->save();
                        return response()->json(['status'=> $pord_check->name." Add to cart"]);
                    }
                }
        } 
        else 
        {
            return response()->json(['status'=>'Login to Contine']);
        }
        
    }
    
    public function viewcart()
    {
        $cart_item =  Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cart_item'));
    }

    public function updatecart(Request $request )
    {
        $prod_id = $request->input('prod_id');
        $products_qty = $request->input('prod_qty');

        if(Auth::check())
        {
            if (Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cart =  Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cart->prod_qty = $products_qty;
                $cart->update();
                return response()->json(['status'=>'Quantity updated']);
            }

        }

    }

    public function deleteproducts(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if (Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status'=>"Products Delete Successfully"]);
            
            }
        }
        else
        {
            return response()->json(['status'=>'Login in Conttinue']);
        }
    }
    
    public function cartcount()
    {
        $cartcount = Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
    }

   
}
