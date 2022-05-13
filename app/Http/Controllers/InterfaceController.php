<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class InterfaceController extends Controller
{
    // $userId=Session::get('user')['id'];
    public $dataIndex;
    function gg(){
        $dataIndex=Product::all();//الداتا بتاعت كل البروداكت
    }
}
