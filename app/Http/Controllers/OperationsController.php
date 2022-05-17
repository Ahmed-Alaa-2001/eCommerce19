<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OperationsController extends Controller
{
    function price(){
        if(Session::has('user')){
            $this->userIdOrderNow=Session::get('user')['id'];
            $this->total= DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$this->userIdOrderNow)
            ->sum('products.price');
            return $this->total;
        }
        return redirect('/login');
    }
}
