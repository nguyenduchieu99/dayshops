@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
<div class="py-3 mb-4 shadow bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a> /
            <a href="{{url('checkout')}}">
                Checkout
            </a>
        </h6>
    </div>
</div>

<div class="container mt-3">
    <form action="{{url('place-order')}}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6> Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->name}}" name="fname" placeholder="Eneter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->lname}}" name="lname" placeholder="Eneter Last Name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->email}}" name="email" placeholder="Eneter Email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->phone}}" name="phone" placeholder="Eneter Phone Number">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->address1}}" name="address1" placeholder="Eneter Address 1">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->address2}}" name="address2" placeholder="Eneter Address 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->city}}" name="city" placeholder="Eneter City">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text"class="form-control"  value="{{Auth::user()->state}}" name="state" placeholder="Eneter State">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->country}}" name="country" placeholder="Eneter Country">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pin Code</label>
                                <input type="text" class="form-control"  value="{{Auth::user()->pincode}}" name="pincode" placeholder="Eneter Pin Code">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart_items as $item)
                                <tr>
                                    <td> {{$item->products->name}}</td>
                                    <td> {{$item->prod_qty}}</td>
                                    <td> {{$item->products->selling_price}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary float-end">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
    
@endsection