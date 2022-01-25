@extends('admin.dashboard')

@section('title')
Add Product
@endsection


@section('dashboard_body')

<form action="{{route('product_save')}}" method="POST" name="product_form" enctype="multipart/form-data">
    @csrf

    @include('layouts.messages')

    <div class="form-group row">
        <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
            <input type="text" name="product_name" class="form-control" id="product_name">

        </div>
    </div>





    <div class="form-group row">
        <label for="category_id" class="col-sm-2 col-form-label">Select Category</label>
        <div class="col-sm-10">
            <select name="category_id" class="form-control" id="category_id">
                <option value="">Please select a category for the product</option>
                @foreach (App\Category::orderBY('category_name', 'asc')->where('parent_id',NUll)->get() as $parent)
                <option value="{{ $parent->id}}">{{ $parent->category_name}}</option>

                @foreach (App\Category::orderBY('category_name', 'asc')->where('parent_id', $parent->id)->get() as
                $child)
                <option value="{{ $child->id}}"> ------> {{ $child->category_name}}</option>
                @endforeach

                @endforeach

            </select>
        </div>
    </div>


    <div class="form-group row">
        <label for="brand_id" class="col-sm-2 col-form-label">Select Brand</label>
        <div class="col-sm-10">
            <select name="brand_id" class="form-control" id="brand_id">

                <option value="">Please select a brand for the product</option>
                @foreach (App\Brand::orderBY('brand_name', 'asc')->get() as $brand)
                <option value="{{ $brand->id}}">{{ $brand->brand_name}}</option>
                @endforeach

            </select>
        </div>
    </div>



    <div class="form-group row">
        <label for="product_short_description" class="col-sm-2 col-form-label">Product Description</label>
        <div class="col-sm-10">
            <textarea name="product_short_description" id="product_short_description" class="form-control"
                rows="5"></textarea>
        </div>
    </div>


    <div class="form-group row">
        <label for="summary-ckeditor" class="col-sm-2 col-form-label">Product Long Description</label>
        <div class="col-sm-10">
            <textarea name="product_long_description" id="summary-ckeditor" class="form-control" rows="5"></textarea>
        </div>
    </div>


    <div class="form-group row">
        <label for="product_price" class="col-sm-2 col-form-label">Product Price</label>
        <div class="col-sm-10">
            <input type="text" name="product_price" class="form-control" id="product_price">


        </div>
    </div>

    <!-- Product  Img -->

    <div class="form-group row">
        <label for="image" class="col-sm-2 col-form-label">Product Image</label>
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
            <button type="submit" class="btn btn-primary"> Product Add</button>
        </div>
    </div>
</form>



@endsection