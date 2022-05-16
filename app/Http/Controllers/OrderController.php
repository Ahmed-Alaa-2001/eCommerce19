<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
class OrderController  extends OperationsController
{
    public $userIdOrderNow;
    public $userIdorderPlace;
    public $userIdmyOrders;
    public $total;
    public $allCart;
    function ordernow(){
        return view('ordernow');
    }
    function orderPlace(Request $req)
    {
        $userIdorderPlace=Session::get('user')['id'];
        $allCart= Cart::where('user_id',$userIdorderPlace)->get();
        foreach($allCart as $cart){
            $order= new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="pending";
            $order->payment_method=$req->payment;
            $order->payment_status="pending";
            $order->address=$req->address;
            $order->save();
            Cart::where('user_id',$userIdorderPlace)->delete(); 
        }
       // $req->input();
        return redirect('/');
    }
    function myOrders(){
        if(Session::has('user')){
            $userIdmyOrders=Session::get('user')['id'];
            $orders= DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->where('orders.user_id',$userIdmyOrders)
            ->get();
            return view('myorders',['orders'=>$orders]);
        }
        return redirect('/login');
    }
}
