@extends('admin.dashboard')

@section('title')
View Company Info
@endsection


@section('dashboard_body')

@include('admin.includes.messages') 



<div class="text-center ">
<h3>  Company Info <a href="{{route('edit_info')}}" class="btn btn-info btn-sm float-right ">Edit Info</a>
       <a href="{{route('delete_info',$view_info->id)}}" class="btn btn-danger btn-sm float-right mr-1 ">Delete Info</a>

  </h3>
</div>
							

    <div class="form-group row mt-4">
        <label for="company_name" class="col-sm-2 col-form-label">Company Name</label>
        <div class="col-sm-4">
            <input type="text" name="company_name" class="form-control " id="company_name" value="{{$view_info->company_name}}" disabled  >
        </div>
    </div>

    <div class="form-group row">
        <label for="company_email" class="col-sm-2 col-form-label">Company Email</label>
        <div class="col-sm-4">
            <input type="text" name="company_email" class="form-control" id="company_email"  value="{{$view_info->company_email}}" disabled >
        </div>
    </div>


    <div class="form-group row">
        <label for="company_mobile" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-4">
            <input type="text" name="company_mobile" class="form-control" id="company_mobile"  value="{{$view_info->company_mobile}}" disabled >
        </div>
    </div>



    <div class="form-group row">
        <label for="company_address" class="col-sm-2 col-form-label">Company Address</label>
        <div class="col-sm-4">
            <input type="text" name="company_address" class="form-control" id="company_address"  value="{{$view_info->company_address}}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="company_city" class="col-sm-2 col-form-label">Company City</label>
        <div class="col-sm-4">
            <input type="text" name="company_city" class="form-control" id="company_city"  value="{{$view_info->company_city}}" disabled>
        </div>
    </div>



    <div class="form-group row">
        <label for="company_country" class="col-sm-2 col-form-label">Company Country </label>
        <div class="col-sm-4">
            <input type="text" name="company_country" class="form-control" id="company_country"  value="{{$view_info->company_country}}" disabled >
        </div>
    </div>


    <div class="form-group row">
        <label for="company_zipcode" class="col-sm-2 col-form-label">Company Zipcode  </label>
        <div class="col-sm-4">
            <input type="text" name="company_zipcode" class="form-control" id="company_zipcode"   value="{{$view_info->company_zipcode}}" disabled >
        </div>
    </div>


    
    <div class="form-group row ">
        <label for="image" class="col-sm-2 col-form-label">Company  logo  </label> <br>

        <img class="ml-3" src="{{ asset('/admin/company/'.$view_info->image) }}" width="100"> <br>
        <input class="w-100" type="hidden"  name="image" value="{{$view_info->image}}"  >

    </div>

@endsection