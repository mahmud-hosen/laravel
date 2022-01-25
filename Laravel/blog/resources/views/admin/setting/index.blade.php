@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">setting List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('setting.create') }}">Create</a></li>






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
                                <h3 class="card-title">Setting List</h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th> Name </th>
                                        <th> Image </th>
                                        <th> Email </th>
                                        <th> phone </th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($settings->count())
                                    @foreach ($settings as $setting)
                                    <tr>
                                        <td>{{ $setting->id }}</td>
                                        <td>{{ $setting->name }}</td>
                                        <td> <img  src="@if($setting->site_logo){{ asset($setting->site_logo) }} @else {{ asset('website/images/user.jpg') }} @endif" alt="Image Placeholder"  class="rounded" width="70" ></td>

                                        <td>{{ $setting->email }}</td>
                                        <td>{{ $setting->phone }}</td>

                                        <td class="d-flex">
                                            <a href="{{ route('setting.show', ['id' => $setting->id]) }}"
                                                class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                            <form action="{{ route('setting.destroy', ['id' => $setting->id]) }}"
                                                class="mr-1" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"> <i
                                                        class="fas fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6">
                                            <h5 class="text-center">No settings found.</h5>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection