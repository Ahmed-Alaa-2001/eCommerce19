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
            $userIdOrderNow=Session::get('user')['id'];
            $total= DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userIdOrderNow)
            ->sum('products.price');
            return $total;
        }
        return redirect('/login');
    }
}
