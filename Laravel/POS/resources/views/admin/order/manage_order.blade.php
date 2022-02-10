@extends('admin.dashboard')

@section('title')
Manage Order
@endsection


@section('dashboard_body')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered ">
                <thead class="thead-light">
                    <tr>
                        <th>SN.</th>
                        <th>Photo </th>
                        <th>Customer Name </th>
                        <th>Total Price</th>
                        <th>Order Date </th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                           @foreach($orders as $order)

                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td> <img  src="{{ asset('admin/customers/'.$order->image) }}"  width="80" ></td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->order_date}}</td>
                            <td>{{$order->payment_status}}</td>

                            <td> <?php if ($order->order_status == "aprove"){
                               echo '<span class="  badge badge-success  badge-counter">'.$order->order_status.'</span>';
                            } else{
                                echo '<span class="badge badge-danger  badge-counter">'.$order->order_status.'</span>';
                            } ?>  </td>

                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-info" href="{{route('order_details',$order->id)}}" title="view Order details"><i class="fas fa-info"></i></a>
                                    <a class="btn btn-success" href="{{route('order_invoice',$order->id)}}"title="view Order Invoice"><i class="fas fa-file-invoice"></i></a>
                                    <a class="btn btn-primary" href="" title="Order Invoice Download"><i class="fas fa-file-download"></i></a>
                                    <a class="btn btn-danger" href="" title=" Order Delete"><i class="fas fa-trash-alt"></i></a>
                                    <a class="btn btn-warning" href="" title=" Order Edit"><i class="far fa-edit"></i></a>
                                </div>
                            </td>
                        </tr> 

                        @endforeach 

  
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection