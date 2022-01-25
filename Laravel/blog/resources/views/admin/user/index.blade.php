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
                                <h1 class="">User List</h1>

                                <a href="{{ route('users.create') }}" class="btn btn-primary">Create users</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th  style="width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                    <tr>
                                    <td>{{ $user->id }}</td>
                                        
                                        <td> <img  src="@if($user->image){{ asset($user->image) }} @else {{ asset('website/images/user.jpg') }} @endif" alt="Image Placeholder"  class="rounded" width="70" ></td>

                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('users.edit', [$user->id]) }}"
                                                class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                            <form action="{{ route('users.destroy', [$user->id]) }}" class="mr-1"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"> <i
                                                        class="fas fa-trash"></i> </button>
                                            </form>
                                            {{-- <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-sm
                                            btn-success mr-1"> <i class="fas fa-eye"></i> </a> --}}
                                        </td>

                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    {{ $users->links() }}

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@endsection