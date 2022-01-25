@extends('admin.dashboard')

@section('title')
Edit Product
@endsection


@section('dashboard_body')

@include('admin.includes.messages') 

<form action="{{route('product_update',$product->id)}}" method="POST" enctype="multipart/form-data">

    @csrf


    <div class="form-group row">
        <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
            <input type="text" name="product_name" class="form-control" id="product_name" value="{{$product->product_name}}">

        </div>
    </div>





    <div class="form-group row">
        <label for="category_id" class="col-sm-2 col-form-label">Select Category</label>
        <div class="col-sm-10">
        <select name="cat_id" class="form-control" id="category_id">
            <option value="">Please select a category for the product</option>
            @foreach (App\Category::orderBY('id', 'asc')->where('parent_id',NUll)->get() as $parent)
            <option value="{{ $parent->id }}" {{ $parent->id== $product->cat_id ? 'selected': '' }}>  {{ $parent->category_name}}</option>

            @foreach (App\Category::orderBY('id', 'asc')->where('parent_id', $parent->id)->get() as $child)
            <option value="{{ $child->id}}" {{ $child->id == $product->cat_id ? 'selected': '' }}>  ------> {{ $child->category_name}}</option>
            @endforeach

            @endforeach

        </select>
        </div>
    </div>



    <div class="form-group row">
        <label for="category_id" class="col-sm-2 col-form-label">Select Supplier</label>
        <div class="col-sm-10">
            <select name="sup_id" class="form-control" id="category_id">

                <option value="">Please select a Supplier for the product</option>

                @foreach (App\Supplier::orderBY('id', 'asc')->get() as $suplier)
                <option value="{{ $suplier->id}}" {{ $suplier->id == $product->sup_id ? 'selected': '' }}> {{ $suplier->name}}</option>
                @endforeach

            </select>
        </div>
    </div>




    <div class="form-group row">
        <label for="product_short_description" class="col-sm-2 col-form-label">Product Description</label>
        <div class="col-sm-10">
            <textarea name="product_short_description" id="product_short_description" class="form-control"
                rows="5">{{$product->product_short_description}}</textarea>
        </div>
    </div>



    <div class="form-group row">
        <label for="buying_price" class="col-sm-2 col-form-label">Product Buying Price</label>
        <div class="col-sm-10">
            <input type="text" name="buying_price" class="form-control" id="buying_price" value="{{$product->buying_price}}">
        </div>
    </div>


    <div class="form-group row">
        <label for="selling_price" class="col-sm-2 col-form-label">Product Selling Price</label>
        <div class="col-sm-10">
            <input type="text" name="selling_price" class="form-control" id="selling_price" value="{{$product->selling_price}}">
        </div>
    </div>


    <div class="form-group row">
        <label for="product_Code" class="col-sm-2 col-form-label">Product Code</label>
        <div class="col-sm-10">
            <input type="text" name="product_Code" class="form-control" id="product_Code" value="{{$product->product_Code}}">
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


    @endsection