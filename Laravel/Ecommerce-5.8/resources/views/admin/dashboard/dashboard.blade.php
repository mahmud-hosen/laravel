@extends('admin.dashboard')

@section('title')
Add Category
@endsection


@section('dashboard_body')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Order Amount</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$order_price_totall}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Totall Customars</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totall_customar}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Totall Products
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$totall_product}}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Totall Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totall_categories}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->




    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered ">
                <thead class="thead-light">
                    <tr>
                        <th>SN.</th>
                        <th>Customer Name </th>
                        <th>Total Price</th>
                        <th>Order Date </th>
                        <th>Payment Type </th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($orders as $order)

                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->first_name.' '.$order->last_name}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->payment_type}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->order_status}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info" href="{{route('order_details',$order->id)}}"
                                    title="view Order details"><i class="fas fa-info"></i></a>
                                <a class="btn btn-success" href="{{route('order_invoice',$order->id)}}"
                                    title="view Order Invoice"><i class="fas fa-file-invoice"></i></a>
                                <a class="btn btn-primary" href="" title="Order Invoice Download"><i
                                        class="fas fa-file-download"></i></a>
                                <a class="btn btn-danger" href="" title=" Order Delete"><i
                                        class="fas fa-trash-alt"></i></a>
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




<!-- /.container-fluid -->

@endsection