@extends('admin.dashboard')

@section('title')
Pos
@endsection



@section('dashboard_body')
@include('admin.includes.messages')

<!-- Begin Page Content -->
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 bg-info">
                    <h3 class="page-title text-white text-center">POS (Point Of Sale )</h3>
                    <h4 class=" text-white text-center">{{date('d/m/y')}}</h4>
                </div>
            </div>
            <table class="table table-bordered table-hover table-warning mt-1">
                <thead>
                    <tr>
                        @foreach ($categorie as $categorie)
                        <th>{{$categorie->category_name}}</th>
                        @endforeach

                    </tr>
                </thead>
            </table>



            <div class="row ">
                <div class="col-lg-6">
                    <div class="card text-center">
                        <div class="card-header " style="background: #69dd99;">
                            <h3 class=" font-weight-bold">Products</h3>
                        </div>

                        <div class="card-body" style="background-color: rgb(245, 241, 238);">




                            <table class="table  table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col"><i class="fas fa-shopping-basket"
                                                style="font-size:25px;color:Green"></i></th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Sub Totall</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <?php 
                                $cart_products = Cart::getContent();
                                 ?>

                                <tbody>

                                    @foreach($cart_products as $Cart_pdt)
                                    <tr>
                                        <form action="{{route('cart_item_update',$Cart_pdt->id)}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="price" value="{{$Cart_pdt->price}}">


                                            <th scope="row">{{$loop->index+1}}</th>
                                            <td>{{$Cart_pdt->name}}</td>
                                            <td>{{$Cart_pdt->price}}</td>

                                            <td> <input class="w-100 form-control " type="number" name="quantity" id=""
                                                    min="1" value="{{$Cart_pdt->quantity}}"> </td>
                                            <td>{{$Cart_pdt->price * $Cart_pdt->quantity}}</td>

                                            <td>

                                                <div class="btn-group" role="group" aria-label="Button group">

                                                    <a href="{{route('cart_item_remove',$Cart_pdt->id)}}"
                                                        class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                    <button type="submit" class="btn btn-success btn-sm"> <i
                                                            class="far fa-edit"></i> </button>
                                                </div>
                                            </td>

                                        </form>

                                    </tr>
                                    @endforeach

                                    <tr>
                                        <th scope="row"></th>
                                        <td colspan="2">Totall : </td>
                                        <td><?php echo Cart::getTotalQuantity(); ?></td>
                                        <td><?php echo Cart::getTotal(); ?></td>
                                    </tr>
                                </tbody>
                            </table>


                            <form action="{{route('create_invoice')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row " style="background: rgb(251, 229, 155);">
                                    <div class="col-lg-6">
                                        <select name="customer_id" class="form-control my-1" id="category_id" required>
                                            <option value="" disabled="" selected="">Please Select a Customer </option>
                                            @foreach ($customer as $customer)
                                            <option value="{{ $customer->id}}">{{ $customer->name}}</option>
                                            @endforeach
                                        </select>



                                    </div>

                                    <div class="col-lg-6 text-center mt-2">

                                        <a href="#" class="btn btn-primary btn-sm float-right" type="submit"
                                            data-toggle="modal" data-target="#contact-modal">Add New</a>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-block btn-success mt-2">Create Invoice</button>
                            </form>

                        </div>
                    </div>
                </div>



                <div class="col-lg-6">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-border table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Cart </th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Price</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($product as $row)

                                    <tr>
                                        <form action="{{route('add_cart')}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <input type="hidden" name="name" value="{{$row->product_name}}">
                                            <input type="hidden" name="price" value="{{$row->selling_price}}">
                                            <input type="hidden" name="quantity" value="1">

                                            <td style="text-align: center; vertical-align: middle;"> <button
                                                    type="submit" class="btn btn-success btn-sm"><i
                                                        class=" fas fa-shopping-cart"></i> </button> </td>
                                            <td style="text-align: center; vertical-align: middle;"> <img
                                                    src="{{ asset('admin/product/'.$row->image) }}" class=""
                                                    style="width:50%"> </td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                {{$row->product_name}}</td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                {{$row->category_name}}</td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                {{$row->selling_price}}</td>
                                        </form>
                                    </tr>

                                </tbody>

                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>


@include('admin.includes.modal')


<!-- /.container-fluid -->

@endsection