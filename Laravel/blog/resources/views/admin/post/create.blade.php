@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row ">

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
                                <h2>Create post</h2>
                                <a href="{{ route('posts.index') }}" class="btn btn-primary">Go Back to Post List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{ route('posts.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')

                                            <div class="form-group row">
                                                <label for="title" class="col-sm-2 col-form-label">Title </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="title" class="form-control"
                                                        value="{{ old('title')}}" id="title">
                                                </div>
                                            </div>







                                            <div class="form-group row">
                                                <label for="brand_id" class="col-sm-2 col-form-label"> Category
                                                </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" class="form-control"
                                                        name="category_id">
                                                        <option value="">Please Select a Category </option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id}}">{{ $category->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <!-- checkbox -->
                                            <div class="form-group  ">
                                                <label for="brand_id" class="col-sm-2 col-form-label"> Tag </label>
                                                <div class=" d-flex flex-wrap ">

                                                    @foreach ($tags as $tag)

                                                    <div class="custom-control custom-checkbox ml-5 mb-2 ">
                                                        <input class="custom-control-input" type="checkbox"
                                                            name="tags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}">
                                                        <label for="tag{{ $tag->id }}" class="custom-control-label">
                                                            {{ $tag->name }}</label>
                                                    </div>

                                                    @endforeach
                                                </div>


                                            </div>


                                            <div class="form-group row ">
                                                <label for="image" class="col-sm-2 col-form-label">Post Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="image" class="form-control" id="image">
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label>Description</label>
                                                <textarea class="form-control " rows="3" id="description"
                                                    name="description" value="{{ old('description')}}"
                                                    placeholder="Enter ..."></textarea>
                                            </div>



                                        </div>
                                        <div class="card-footer mt-0">
                                            <button type="submit" class="btn btn-md btn-primary">Submit</button>
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


@section('style')
<link rel="stylesheet" href="{{ asset('admin')}}/summernote/summernote-bs4.min.css">
@endsection


@section('script')
<script src="{{ asset('admin')}}/summernote/summernote-bs4.min.js"></script>

<script>
$('#description').summernote({
    placeholder: 'Hello Bootstrap 4',
    tabsize: 2,
    height: 100
});
</script>
@endsection