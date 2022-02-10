@extends('admin.dashboard')

@section('title')
<?php echo $mth ?> EXPENSE 
@endsection

@section('dashboard_body')

<div class="text-center ">
<h2> Totall Order <?php echo $mth ?>  : {{$total_sales}} <a href="{{route('pos')}}" class="btn btn-info btn-sm float-right ">ADD NEW</a> </h2>
</div>




<form action="#" method="POST">
    @csrf

    <table class="table table-border table-hover">
        <thead>
            <tr class="text-center">
                <th>SN</th>
                <th>Image</th>
                <th>Name</th>
                <th>Order Status</th>
                <th>payment_status</th>
                <th>Totall Products</th>
                <th>total</th>
                <th>vat</th>
                <th>pay</th>
                <th>due</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($sales_details as $today)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td> <img  src="{{ asset('admin/customers/'.$today->image) }}"  width="80" ></td>
                <td>{{$today->name}}</td>
                <td>{{$today->order_status}}</td>
                <td>{{$today->payment_status}}</td>
                <td>{{$today->totall_products}}</td>
                <td>{{$today->total}}</td>
                <td>{{$today->vat}}</td>
                <td>{{$today->pay}}</td>
                <td>{{$today->due}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Button group">
                    <a class="btn btn-info" href="{{route('order_details',$today->id)}}" title="view Order details">View</a>
                    </div>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>

    @endsection