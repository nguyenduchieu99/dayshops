@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-category/'.$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                     <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}">
                    </div>
                     <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea  class="form-control" rows="3" name="description" value="">{{$category->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{$category->status == "1" ? 'checked':'' }}> 
                    </div>
                    <div class="col-md-6 mb-3"> 
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular" {{$category->popular == "1" ? 'checked':''}}>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">          
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" value="{{$category->meta_keywords}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_descrip" class="form-control" rows="3" value="">{{$category->meta_descrip}}</textarea>
                    </div>
                    @if ($category->image)
                        <img src="{{asset('assets/uploads/category/'.$category->image) }}" alt="Category image" width="100">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="Update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection