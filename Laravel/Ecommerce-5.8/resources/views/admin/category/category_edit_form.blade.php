@extends('admin.dashboard')

@section('title')
Edit Category
@endsection

@section('dashboard_body')

<form action="{{route('category_update',$category->id)}}" method="POST" enctype="multipart/form-data">
    @csrf

    @include('layouts.messages')

    <div class="form-group row">
        <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <input type="text" name="category_name" class="form-control" id="category_name"
                value="{{$category->category_name}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="category_description" class="col-sm-2 col-form-label">Category Description</label>
        <div class="col-sm-10">
            <textarea name="category_description" id="category_description" class="form-control"
                rows="5">{{$category->category_description}}</textarea>
        </div>
    </div>







    <div class="form-group row">
        <label for="parent_id" class="col-sm-2 col-form-label">Parent Category (Optional) </label>
        <div class="col-sm-10">
            <select class="form-control" name="parent_id">
                <option value="">Please Select a Primary Category </option>


                @foreach ($all_categories as $cat)

                <option value="{{ $cat->id}}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>
                    {{ $cat->category_name }} </option>

                @endforeach

            </select>
        </div>
    </div>






    <div class="form-group row">
        <label for="image" class="col-sm-2 col-form-label">Category Old Image</label> <br>

        <img src="{{ asset('/admin/category/'.$category->image) }}" width="100"> <br>

    </div>


    <div class="form-group row">
        <label for="image" class="col-sm-2 col-form-label">Category New Image (Optional)</label>
        <div class="col-sm-10">
            <input type="file" name="image" class="form-control" id="image">
        </div>
    </div>


    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Publication Status</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{$category->publication_status == 1 ? 'checked':''}}
                        name="publication_status" id="publication_status" value="1">
                    <label class="form-check-label" for="publication_status">
                        Published
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" {{$category->publication_status == 0 ? 'checked':''}}
                        name="publication_status" id="publication_status" value="0">
                    <label class="form-check-label" for="publication_status">
                        Unpublished
                    </label>
                </div>

            </div>
        </div>
    </fieldset>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Update Category </button>
        </div>
    </div>
</form>

@endsection