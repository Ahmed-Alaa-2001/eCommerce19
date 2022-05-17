<?php
  // Cart::destroy($id);
  // use App\Http\Controllers\OrderController;
  // $cart=new Cart;
  // deleteItem($id,$card);
?>
@extends('layout')
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            {{-- <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br> --}}
            @foreach($products as $item)
            <div class=" row searched-item cart-list-devider">
            <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-img" src="{{$item->gallery}}">
                  </a>
            </div>
            <div class="col-sm-4">
                    <div class="">
                      <h2>{{$item->name}}</h2>
                      <h5>{{$item->description}}</h5>
                    </div>
            </div>
            <div class="col-sm-3">
                {{-- <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning" >Remove to Cart</a> --}}
                <a href="/removecart/{{$item->cart_id}}/{{0}}" class="btn btn-warning" >Remove from Cart</a>
            </div>
            </div>
            @endforeach
          </div>
          <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>

     </div>
</div>
@endsection 