@extends('admin.dashboard')

@section('title')
Add Category
@endsection


@section('dashboard_body')

<form action="{{route('category_save')}}" method="POST" enctype="multipart/form-data">

    @csrf

    @include('layouts.messages')

    <div class="form-group row">
        <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <input type="text" name="category_name" class="form-control" id="category_name">
        </div>
    </div>

    <div class="form-group row ">
        <label for="summary-ckeditor" class="col-sm-2 col-form-label">Category Description</label>
        <div class="col-sm-10">
            <textarea name="category_description" id="summary-ckeditor" class="form-control" rows="5"></textarea>
        </div>
    </div>




    <div class="form-group row">
        <label for="brand_id" class="col-sm-2 col-form-label">Parent Category (Optional) </label>
        <div class="col-sm-10">
            <select class="form-control" class="form-control" name="parent_id" >

                <option value="">Please Select a Parent Category </option>

                @foreach ($all_categories as $category)

                <option value="{{ $category->id}}">{{ $category->category_name }}</option>

                @endforeach

            </select>
        </div>
    </div>








    <div class="form-group row">
        <label for="image" class="col-sm-2 col-form-label">Category Image</label>
        <div class="col-sm-10">
            <input type="file" name="image" class="form-control" id="image">
        </div>
    </div>



    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Publication Status</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="publication_status" id="publication_status"
                        value="1">
                    <label class="form-check-label" for="publication_status">
                        Published
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="publication_status" id="publication_status"
                        value="0">
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
            <button type="submit" class="btn btn-primary"> Category Add</button>
        </div>
    </div>
    
</form>

@endsection