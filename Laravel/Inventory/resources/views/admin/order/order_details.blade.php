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
                    <td>{{$customar_order->id}}</td>
                </tr>
                <tr>
                    <th>Total Price </th>
                    <td>{{$customar_order->total}}</td>
                </tr>
                <tr>
                    <th>Order Status </th>

                    <td> <?php if ($customar_order->order_status == "aprove"){
                               echo '<span class="badge badge-success  badge-counter">'.$customar_order->order_status.'</span>';
                            } else{
                                echo '<span class="badge badge-danger  badge-counter">'.$customar_order->order_status.'</span>';
                            } ?>  </td>

                           

                </tr>

                <tr>
                    <th>Payment Status </th>
                    <td>{{$customar_order->payment_status}}</td>
                </tr>

                <tr>
                    <th>Order Date </th>
                    <td>{{$customar_order->order_date}}</td>
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
                    <td>{{$customar_order->name}}</td>
                </tr>
                <tr>
                    <th>Phone Number </th>
                    <td>{{$customar_order->phone}}</td>
                </tr>
                <tr>
                    <th>Email Address </th>
                    <td>{{$customar_order->email}}</td>
                </tr>
                <tr>
                    <th>Address </th>
                    <td>{{$customar_order->address}}</td>
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
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity <span class="badge badge-success  badge-counter">  {{$customar_order->totall_products}}</span></th>
                        <th>Total Price</th>


                    </tr>
                </thead>
                <tbody>


                    @foreach ($order_details as $order_detail)

                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td> <img src="{{ asset('admin/product/'.$order_detail->image) }}" width="50"></td>
                        <td>{{$order_detail->product_name}}</td>
                        <td>{{$order_detail->unitcost}}</td>
                        <td>{{$order_detail->quantity}}</td>
                        <td>+ {{$order_detail->total}}</td>



                    </tr>
                    @endforeach

                    <tr>
                        <th scope="row"></th>
                        <td colspan="4">A finance charge of 1.5% </td>
                        <td>+ {{$customar_order->vat}}</td>
                    </tr>

                    <tr>
                        <th scope="row"></th>
                        <td colspan="4">Totall : </td>
                        <td>
                            <h5 class="text-success  font-weight-bold "> {{$customar_order->total}} </h5>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"></th>
                        <td colspan="4">Pay : </td>
                        <td class="text-primary   font-weight-bold ">- {{$customar_order->pay}}</td>
                    </tr>

                    <tr>
                        <th scope="row"></th>
                        <td colspan="4">Due </td>
                        <td class="text-danger"> {{$customar_order->due}}</td>
                    </tr>


                </tbody>
            </table>
            @if($customar_order->order_status == "aprove" )
            @else
                <div class="col-lg-12 text-center mt-2">
                <a  href="{{route('aprove_order',$customar_order->id)}}" class="btn btn-primary  btn-md float-right" type="submit" >    Confirm Order   </a>
            </div>

            @endif

          


        </div>
    </div>

</div>




@endsection