<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;


class CartController extends OrderController implements deleteInterfaceController,liskovController
{
    private $userIdCartItem;
    private $userIdCartlist;
    private $userId;
    function add(Request $req){
        if($req->session()->has('user')){
            $this->cart= new Cart;
            $this->cart->user_id=$req->session()->get('user')['id'];
            $this->cart->product_id=$req->product_id;
            $this->cart->save();
            return redirect('/');
        }
        else
            return redirect('/login');
    }
    static function cartItem(){
        $userIdCartItem=Session::get('user')['id'];
        return Cart::where('user_id',$userIdCartItem)->count();
    }
    function aboutDelete($id,$state){
        if($state==0){
            $delete=new deleteController;
            $deletecart=new CartController;
            $delete->deleteItem($deletecart,$id);
            return redirect('cartlist');
        }
        if($state==1){
            $delete=new deleteController;
            $deleteorder=new OrderController;
            $delete->deleteItem($deleteorder,$id);
            return redirect('myorders');
        }
    }
    function cartlist(){
        if(Session::has('user')){
            $userIdCartlist=Session::get('user')['id'];
            $this->products= DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userIdCartlist)
            ->select('products.*','cart.id as cart_id')
            ->get();
            return view('cartlist',['products'=>$this->products]);
        }
        return redirect('/login');
    }
    function remove($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }
}
