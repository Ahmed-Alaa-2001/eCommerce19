<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

interface CartInterfaceController
{
    function addToCart(Request $req);
    static function cartItem();
    function cartlist();
    function removeCart($id);
}
