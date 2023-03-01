@extends('layouts.front')

@section('title','Edit a review')

@section('content')
<div class="container py-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <h5>Bạn đang viết một bài đánh giá cho {{$review->product->name}}</h5>
                        <form action="{{url('/update-review')}}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" name="review_id" value="{{$review->product->id}}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review">{{$review->user_review}}</textarea>
                            <button type="submit" class="btn btn-primary mt-3">Sumbit Review</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection