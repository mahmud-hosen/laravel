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
                                <h3 >Post List</h3>

                                <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
                            </div>
                        </div>
                        <!-- /.card-header -->


                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Tag</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if($posts->count())

                                    @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td> <img src="{{ $post->image }}" width="70" ></td>

                                        <td>{{ $post->slug }}</td>
                                        <td> {!! $post->description !!} </td>
                                        <td> {{ $post->category->name }} </td>

                                        <td>
                                           @foreach($post->tags as $tag)
                                           <span class="badge badge-primary">{{$tag->name}}</span>
                                           @endforeach
                                        </td>

                                        <td class="d-flex">

                                              <a href="{{ route('posts.show', [$post->id]) }}" class="btn btn-sm  btn-success mr-1"> <i class="fas fa-eye"></i> </a> 

                                            <a href="{{ route('posts.edit', [$post->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>

                                            <form action="{{ route('posts.destroy', [$post->id]) }}" class="mr-1"
                                                method="POST">
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
                                            <h5 class="text-center">No posts Founds </h5>
                                        </td>
                                    </tr>

                                    @endif



                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    {{ $posts->links() }}

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@endsection