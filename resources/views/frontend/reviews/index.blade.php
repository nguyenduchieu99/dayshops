@extends('layouts.front')

@section('title','Write a review')

@section('content')
<div class="container py-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($verified_purchase->count() > 0)
                        <h5>Bạn đang viết một bài đánh giá cho {{$product->name}}</h5>
                        <form action="{{url('/add-review')}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review"></textarea>
                            <button type="submit" class="btn btn-primary mt-3">Sumbit Review</button>
                        </form>
                    @else
                        <div class="alert alert-danger">
                            <h5>Bạn không đủ điều kiện để xem xét sản phẩm này</h5>
                        </div>
                        <p>
                            Chỉ có khánh hàng mua sản phẩm rồi mới đánh giá được sản phẩm này.
                        </p>
                        <a href="{{url('/')}}" class="btn btn-primary mt-3">Đi đến trang chủ.</a>
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection