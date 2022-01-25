@extends('admin.dashboard')

@section('title')
Order Details
@endsection


@section('dashboard_body')




<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mb-4">
                <h2 class="text-center">Order info for this order</h2>
            <table class="table table-hover table-bordered ">

                    <tr>
                        <th>Order No</th>
                        <td>{{$customar_order->id }}</td>
                    </tr>
                    <tr>
                        <th>Total Price  </th>
                        <td>{{$customar_order->total_price}}</td>
                    </tr>
                    <tr>
                        <th>Order Status  </th>
                        <td>{{$customar_order->order_status}}</td>
                    </tr>
					<tr>
                        <th>Payment Status  </th>
                        <td>{{$customar_order->payment_status}}</td>
                    </tr>
					<tr>
                        <th>Payment type  </th>
                        <td>{{$customar_order->payment_type}}</td>
                    </tr>
                    <tr>
                        <th>Order Date </th>
                        <td>{{$customar_order->created_at}}</td>
                    </tr>

             
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto mb-4">
                <h2 class="text-center">Customer info for this order</h2>
            <table class="table table-hover table-bordered ">
                    <tr>
                        <th>Customer Name </th>
                        <td>{{$customar->first_name.' '.$customar->last_name}}</td>
                    </tr>
                    <tr>
                        <th>Phone Number </th>
                        <td>{{$customar->phone_number}}</td>
                    </tr>
                    <tr>
                        <th>Email Address </th>
                        <td>{{$customar->email_address}}</td>
                    </tr>
                    <tr>
                        <th>Address </th>
                        <td>{{$customar->address}}</td>
                    </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto mb-4">
                <h2 class="text-center">Shipping info for this order</h2>
            <table class="table table-hover table-bordered ">
                    <tr>
                        <th>Full Name </th>
                        <td>{{$shipping_info->full_name}}</td>
                    </tr>
                    <tr>
                        <th>Phone Number </th>
                        <td>{{$shipping_info->phone_number}}</td>
                    </tr>
                    <tr>
                        <th>Email Address </th>
                        <td>{{$shipping_info->email_address}}</td>
                    </tr>
                    <tr>
                        <th>Address </th>
                        <td>{{$shipping_info->address}}</td>
                    </tr>
            </table>
        </div>
    </div>
    <div class="row">
            <div class="col-md-12 mb-5 text-center">
                    <h2 class="text-center">Product info for this order</h2>
                <table class="table table-hover table-bordered ">
                    <thead class="thead-light">
                        <tr>
                            <th>SN.</th>
                            <th>Product Id</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    

                            @foreach ($product_info as $product_info)

                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$product_info->id}}</td>
                                <td> <img  src="{{ asset('images/'.$product_info->image) }}"  width="50" ></td>
                                <td>{{$product_info->product_name}}</td>
                                <td>{{$product_info->product_price}}</td>
                                <td>{{$product_info->product_quantity}}</td>
                                <td>{{$customar_order->total_price}}</td>


                                
                            </tr> 




                            @endforeach


                    </tbody>
                </table>
            </div>
        </div>

</div>




@endsection










