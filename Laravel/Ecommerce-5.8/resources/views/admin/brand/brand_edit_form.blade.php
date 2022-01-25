@extends('admin.dashboard')

@section('title')
Edit Brand
@endsection

@section('dashboard_body')

<form action="{{route('brand_update',$brand->id)}}" method="POST">
    @csrf

    @include('layouts.messages')



    <div class="form-group row">
        <label for="brand_name" class="col-sm-2 col-form-label">Brand Name</label>
        <div class="col-sm-10">
            <input type="text" name="brand_name" class="form-control" id="brand_name"
                value="{{$brand->brand_name}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="brand_description" class="col-sm-2 col-form-label">Brand Description</label>
        <div class="col-sm-10">
            <textarea name="brand_description" id="brand_description" class="form-control"
                rows="5">{!!$brand->brand_description!!}</textarea>

        </div>
    </div>




    
    <div class="form-group row">
        <label for="image" class="col-sm-2 col-form-label">Brand Old Image</label> <br>

        <img src="{{ asset('/admin/brand/'.$brand->image) }}" width="100"> <br>

    </div>


    <div class="form-group row">

    
        <label for="image" class="col-sm-2 col-form-label">Brand New Image (Optional)</label>
        <div class="col-sm-10">
            <input type="file" name="image" class="form-control" id="image">
        </div>
    </div>





    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Publication Status</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{$brand->publication_status == 1 ? 'checked':''}}
                        name="publication_status" id="publication_status" value="1">
                    <label class="form-check-label" for="publication_status">
                        Published
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" {{$brand->publication_status == 0 ? 'checked':''}}
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
            <button type="submit" class="btn btn-primary">Update Brand </button>
        </div>
    </div>
</form>

@endsection