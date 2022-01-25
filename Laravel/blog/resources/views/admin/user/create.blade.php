@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

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
                                <h2 class="">Create User</h2>
                                <a href="{{ route('users.index') }}" class="btn btn-primary">Go Back to User List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{ route('users.store') }}" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')
                                            <div class="form-group">
                                                <label for="name">User Name</label>
                                                <input type="name" name="name" class="form-control" id="name"
                                                    placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">User Email</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="Enter email">
                                            </div>

                                            <div class="form-group">
                                                <label for="description">User Description</label>
                                                <input type="text" name="description" class="form-control" id="description"
                                                    placeholder="Enter Your Description" >
                                            </div>



                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label for="logo">Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="image" class="custom-file-input"
                                                                id="image">
                                                            <label class="custom-file-label" for="image">Choose
                                                                Image</label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="password">User Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="password" placeholder="Enter password">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection