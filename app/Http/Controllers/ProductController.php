<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
class ProductController extends InterfaceController
{
    public $dataIndex; 
    public $dataDetail;
    public $dataSearch;
    function index(){
        $dataIndex=Product::all();//الداتا بتاعت كل البروداكت
        return view('product',['products'=>$dataIndex]);
    }
    function detail($id){
        $dataDetail =Product::find($id);//الداتا بتاعت اي دي معين
        return view('detail',['product'=>$dataDetail]);
    }
    function search(Request $req){
        $dataSearch= Product::
        where('name', 'like', '%'.$req->input('query').'%')//هدخل اسم 
        ->get();
        return view('search',['products'=>$dataSearch]);
        // return $req->query();
    }
}