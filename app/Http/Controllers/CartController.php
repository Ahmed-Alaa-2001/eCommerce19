<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;


class CartController extends ProductController
{
   /* public $userIdCartItem;
    public $userIdCartlist;
    public $userId;*/
    function addToCart(Request $req){
        if($req->session()->has('user')){
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/');

        }
        else
            return redirect('/login');
    }
    static function cartItem(){
        $userIdCartItem=Session::get('user')['id'];
        return Cart::where('user_id',$userIdCartItem)->count();
    }
    function cartlist(){
        if(Session::has('user')){
            $userIdCartlist=Session::get('user')['id'];
            $products= DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
         //   ->where('cart.user_id',$userIdCartlist)
            ->select('products.*','cart.id as cart_id')
            ->get();
            return view('cartlist',['products'=>$products]);
        }
        return redirect('/login');
    }
    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }
}
