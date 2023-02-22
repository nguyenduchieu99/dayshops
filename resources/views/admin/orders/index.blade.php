@extends('layouts.admin')

@section('title')
    Orders  
@endsection

@section('content')

                <div class="card">
                    <div class="card-header">
                        <h4>New Orders
                            <a href="{{'order-history'}}" class="btn btn-warning float-right">Order Histroy</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                <tr>
                                    <td>{{date('Y-d-m',strtotime($item->created_at))}}</td>
                                    <td>{{$item ->tracking_no}}</td>
                                    <td>{{$item ->total_price}}</td>
                                    <td>{{$item ->status == '0' ?'Pending' : 'Completed'}}</td>
                                    {{-- //pending:: chưa giải quyết
                                    completed:hoàn thành  --}}
                                    <td>
                                        <a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>

@endsection