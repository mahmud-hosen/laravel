@extends('admin.dashboard')

@section('title')
Project Info
@endsection


@section('dashboard_body')

@include('admin.includes.messages') 

<div class="text-center">
<h3>ADD Company Info </h3>
</div>

								

<form action="{{route('insert_info')}}" method="POST" enctype="multipart/form-data">
    @csrf									

    <div class="form-group row">
        <label for="company_name" class="col-sm-2 col-form-label">Company Name</label>
        <div class="col-sm-10">
            <input type="text" name="company_name" class="form-control " id="company_name">
        </div>
    </div>

    <div class="form-group row">
        <label for="company_email" class="col-sm-2 col-form-label">Company Email</label>
        <div class="col-sm-10">
            <input type="text" name="company_email" class="form-control" id="company_email">
        </div>
    </div>


    <div class="form-group row">
        <label for="company_mobile" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
            <input type="text" name="company_mobile" class="form-control" id="company_mobile">
        </div>
    </div>



    <div class="form-group row">
        <label for="company_address" class="col-sm-2 col-form-label">Company Address</label>
        <div class="col-sm-10">
            <input type="text" name="company_address" class="form-control" id="company_address">
        </div>
    </div>

    <div class="form-group row">
        <label for="company_city" class="col-sm-2 col-form-label">Company City</label>
        <div class="col-sm-10">
            <input type="text" name="company_city" class="form-control" id="company_city">
        </div>
    </div>



    <div class="form-group row">
        <label for="company_country" class="col-sm-2 col-form-label">Company Country </label>
        <div class="col-sm-10">
            <input type="text" name="company_country" class="form-control" id="company_country">
        </div>
    </div>


    <div class="form-group row">
        <label for="company_zipcode" class="col-sm-2 col-form-label">Company Zipcode  </label>
        <div class="col-sm-10">
            <input type="text" name="company_zipcode" class="form-control" id="company_zipcode">
        </div>
    </div>


    <div class="form-group row">
        
        <label for="photo" class="col-sm-2 col-form-label">Company logo</label>
        <div class="col-sm-10">
            <input type="file" name="image" accept="image/*" class="upload" required
                onchange="readURL(this);">
                <img id="image" src="#" />
        </div>
        
    </div>




    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary"> Add Information</button>
        </div>
    </div>

</form>



<script type="text/javascript">

function readURL(input) {

    if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(80)
                    .heigth(80);
            }
            reader.readAsDataURL(input.files[0]);
        }

    }
</script>





@endsection