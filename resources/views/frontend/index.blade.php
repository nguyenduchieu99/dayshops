@extends('layouts.front')

@section('title')
    Welcome to DayShops    
@endsection

@section('content')
    @include('layouts.inc.frontslider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featurde Products</h2>
                <div class="owl-carousel owl-theme" >
                    @foreach ($featured_products as $prod)
                    <div class="item">
                        <a href="{{url('category/'.$prod->category->name.'/'.$prod->slug)}}">
                            <div class="card">
                                <img src="{{asset('assets/uploads/products/'.$prod->image)}}" class="lazy img-responsive" alt="Product Image">
                                <div class="card-body">
                                    <h5>{{$prod->name}}</h5>
                                    <span class="float-start">{{$prod->selling_price}}</span>
                                    <span class="float-end"><s> {{$prod->original_price}}</s></span>
                                </div>
                            </div>
                        </a>
                            
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Category</h2>
                <div class="owl-carousel owl-theme" >
                    @foreach ($trending_category as $trend_cate)
                        <div class="item">
                            <a href="{{url('category/'.$trend_cate->slug)}}">
                                <div class="card">
                                    <img src="{{asset('assets/uploads/category/'.$trend_cate->image)}}" class="lazy img-responsive" alt="Product Image">
                                    <div class="card-body">
                                        <h5>{{$trend_cate->name}}</h5>
                                        <p>
                                            {{ $trend_cate->description}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection