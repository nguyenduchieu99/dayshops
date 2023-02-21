@extends('layouts.front')

@section('title')
    My cart  
@endsection

@section('content')
<div class="py-3 mb-4 shadow bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a> /
            <a href="{{url('cart')}}">
                Cart
            </a>
        </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
            @php
                $total = 0;
            @endphp
            @foreach ($cart_item as $item)
            <div class="row  product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" height="70px" width="70px" alt="Image here">
                </div>
                <div class="col-md-3 my-auto">
                    <h6> {{$item->products->name}}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{$item->products->selling_price}} $</h6>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if ($item->products->qty >= $item->prod_qty)
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width:40%;">
                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                            <input type="text" name="quantity" value="{{$item->prod_qty}}" class="form-control qty-input text-center">
                            <button class="input-group-text changeQuantity increment-btn">+</button>
                        </div>
                    @else
                        <h6>Out of Stock</h6>
                        
                    @endif
                 
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"> </i> Remote</button>
                </div>
            </div>
            @php
                $total += $item->products->selling_price * $item->prod_qty;
            @endphp
            @endforeach  
        </div>
        <div class="card-footer">
            <h6>Total Price : {{$total}}$
                <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceed to Checkout</a>  
            </h6>            
        </div>
    </div>
</div>
@endsection