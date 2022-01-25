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
                                <h2 >Create post</h2>
                                <a href="{{ route('posts.index') }}" class="btn btn-primary">Go Back to post List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{ route('posts.update',[$post->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')




                                            <div class="form-group row">
                                                <label for="title" class="col-sm-2 col-form-label">Title </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="title" class="form-control"
                                                        value="{{$post->title}}" id="title">
                                                </div>
                                            </div>



                                            <div class="form-group row  ">
                                                <label for="parent_id" class="col-sm-2 col-form-label"> Category
                                                </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="category_id">
                                                        <option value="">Please Select a Category </option>
                                                        @foreach ($categories as $cat)
                                                        <option value="{{ $cat->id}}"
                                                            {{ $cat->id == $post->category_id ? 'selected' : '' }}>
                                                            {{ $cat->name }} </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>



                                            <!-- checkbox -->
                                            <div class="form-group">
                                                @foreach ($tags as $tag)

                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" name="tags[]"
                                                        id="tag{{ $tag->id }}" value="{{ $tag->id }}"
                                                        @foreach($post->tags as $t)
                                                    @if($tag->id == $t->id) checked @endif


                                                    @endforeach
                                                    >
                                                    <label for="tag{{ $tag->id }}" class="custom-control-label">
                                                        {{ $tag->name }}</label>
                                                </div>

                                                @endforeach

                                            </div>






                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label for="logo">Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="image" class="custom-file-input"
                                                                id="image">
                                                            <label class="custom-file-label" for="image">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <div style=" margin-left: auto">
                                                            <img src="@if($post->image){{ asset($post->image) }} @else {{ asset('website/images/user.jpg') }} @endif"
                                                                alt="Image Placeholder" class="rounded" width="70">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control " rows="3" id="description"
                                                    name="description"
                                                    value="{{ old('description')}}">{!! $post->description !!}</textarea>
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


@section('style')
<link rel="stylesheet" href="{{ asset('admin')}}/summernote/summernote-bs4.min.css">
@endsection


@section('script')
<script src="{{ asset('admin')}}/summernote/summernote-bs4.min.js"></script>

<script>
$('#description').summernote({
    placeholder: 'Hello Bootstrap 4',
    tabsize: 2,
    height: 200
});
</script>
@endsection