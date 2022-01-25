@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">tag List</h3>

                                <a href="{{ route('setting.edit',$setting->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">

                                <tbody>
                                    <tr>
                                        <th>Image </th>
                                        <td> <img  src="@if($setting->site_logo){{ asset($setting->site_logo) }} @else {{ asset('website/images/user.jpg') }} @endif" alt="Image Placeholder"  class="rounded" width="70" ></td>

                                    </tr>

                                    
                                    <tr>
                                        <th>Name </th>
                                        <td>{{$setting->name}}</td>

                                    </tr>

                                    <tr>
                                        <th>Email </th>
                                        <td>{{$setting->email}}</td>
                                    </tr>

                                    <tr>
                                        <th>Phone </th>
                                        <td>{{$setting->phone}}</td>
                                    </tr>

                                    <tr>
                                        <th>Address </th>
                                        <td>{{$setting->address}}</td>
                                    </tr>

                                    <tr>
                                        <th>Description </th>
                                        <td>{{$setting->description}}</td>
                                    </tr>

                                    <tr>
                                        <th>Facebook </th>
                                        <td>{{$setting->facebook}}</td>
                                    </tr>

                                    <tr>
                                        <th>Twitter </th>
                                        <td>{{$setting->twitter}}</td>
                                    </tr>

                                    <tr>
                                        <th>Instagram </th>
                                        <td>{{$setting->instagram}}</td>
                                    </tr>

                                    <tr>
                                        <th>Reddit </th>
                                        <td>{{$setting->reddit}}</td>
                                    </tr>

                                    <tr>
                                        <th>Copyright </th>
                                        <td>{{$setting->copyright}}</td>
                                    </tr>
                    

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@endsection