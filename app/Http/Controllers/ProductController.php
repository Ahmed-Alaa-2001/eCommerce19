<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
class ProductController implements productInterfaceController
{
    public $dataIndex; 
    public $dataDetail;
    public $dataSearch;
    function Home(){
        $dataIndex=Product::all();//الداتا بتاعت كل البروداكت
        return view('product',['products'=>$dataIndex]); 
    }
    function detail($id){
        $dataDetail =Product::find($id);//الداتا بتاعت اي دي معين
        return view('detail',['product'=>$dataDetail]);
    }
    function search(Request $req){
        $dataSearch= Product::
        where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$dataSearch]);
        // return $req->query();
    }
    // function z($id){
    //    //الداتا بتاعت اي دي معين
    //     return '1';
    // }
    // function index1(){
    //     $product= new Product;
    //     $x=$product->price;
    //     echo $x;
    // }
}