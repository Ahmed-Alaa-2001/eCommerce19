<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
class OrderController  extends OperationsController implements deleteInterfaceController,liskovController
{
    public $userIdOrderNow;
    public $userIdorderPlace;
    public $userIdmyOrders;
    public $total;
    public $allCart;
    function ordernow(){
        return view('ordernow');
    }
    function add(Request $req)
    {
        $userIdorderPlace=Session::get('user')['id'];
        $allCart= Cart::where('user_id',$userIdorderPlace)->get();
        foreach($allCart as $cart){
            $this->order= new Order;
            $this->order->product_id=$cart['product_id'];
            $this->order->user_id=$cart['user_id'];
            $this->order->status="pending";
            $this->order->payment_method=$req->payment;
            $this->order->payment_status="pending";
            $this->order->address=$req->address;
            $this->order->save();
            Cart::where('user_id',$userIdorderPlace)->delete(); 
        }
       // $req->input();
        return redirect('/');
    }
    function myOrders(){
        if(Session::has('user')){
            $this->userIdmyOrders=Session::get('user')['id'];
            $this->orders= DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->where('orders.user_id',$this->userIdmyOrders)
            ->select('products.*','orders.id as orders_id')
            ->get();
            return view('myorders',['orders'=>$this->orders]);
        }
        return redirect('/login');
    }
    function remove($id){
        Order::destroy($id);
        return redirect('myorders');
    }
}
