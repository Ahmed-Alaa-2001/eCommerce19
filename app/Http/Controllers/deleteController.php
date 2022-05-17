<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
class deleteController extends Controller
{
    function deleteItem($type,$id){
        $deleteObject=$type;
        $deleteObject->remove($id);
    }
}
