<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\WishLish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = WishLish::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',compact('wishlist'));
        # code...
    }

    public function add(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish = new WishLish();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status'=>'Product Added to WishList']);

            }
            else
            {
                return response()->json(['status'=>'Product doesnot exits']);
            }
        }
        else{
            return response()->json(['status'=>"Login to Continue"]);
        }
    }

    public function delete(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if (WishLish::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $wish = WishLish::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $wish->delete();
                return response()->json(['status'=>"Item Delete from WishList"]);
            }
        }
        else
        {
            return response()->json(['status'=>'Login in Conttinue']);
        }
    }

      
    public function wishlistcount()
    {
        $wishlistcount = WishLish::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$wishlistcount]);
    }
}
