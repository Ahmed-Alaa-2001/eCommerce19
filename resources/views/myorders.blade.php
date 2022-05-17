@extends('layout')
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>myorders</h4>
            @foreach($orders as $item)
            <div class=" row searched-item cart-list-devider">
            <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-img" src="{{$item->gallery}}">
                </a>
            </div>
            <div class="col-sm-4">
                <div class="">
                    <h2>Name : {{$item->name}}</h2>
                    <h5>Delivery Status : {{$item->description}}</h5>
                    {{-- <h5>Address : {{$item->address}}</h5>
                    <h5>payment status : {{$item->payment_status}}</h5>
                    <h5>Payment Method : {{$item->payment_method}}</h5> --}}
                </div>
            </div>
            <div class="col-sm-3">
                <a href="/removeOrder/{{$item->orders_id}}" class="btn btn-warning" >Remove from Order</a>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection 