@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
               
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
                                <h2 >Post Show </h2>

                                <a href="{{ route('tags.create') }}" class="btn btn-primary">Create tag</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">

                                <tbody>
                                 

                                    <tr>
                                        <th>Image </th>
                                        <td> <img  src="@if($post->image){{ asset($post->image) }} @else {{ asset('website/images/insert_image_logo.jpg') }} @endif" alt="Image Placeholder"  class="rounded" width="70" ></td>

                                    </tr>


                                    <tr>
                                        <th>Title </th>
                                        <td>{{$post->title}}</td>

                                    </tr>

                                    <tr>
                                        <th>Category Name </th>
                                        <td>{{$post->category->name}}</td>

                                    </tr>

                                    
                                    <tr>
                                        <th>Tag </th>
                                        <td>
                                           @foreach($post->tags as $tag)
                                           <span class="badge badge-primary">{{$tag->name}}</span>
                                           @endforeach
                                        </td>

                                    </tr>

                                    <tr>
                                        <th>Description </th>
                                        <td>{!! $post->description !!}</td>

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