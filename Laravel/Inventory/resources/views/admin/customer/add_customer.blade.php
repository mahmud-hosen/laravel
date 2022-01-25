@extends('admin.dashboard')

@section('title')
Add Customer
@endsection


@section('dashboard_body')

@include('admin.includes.messages') 

<div class="text-center">
<h3>ADD Customer</h3>
</div>

<form action="{{route('insert_customer')}}" method="POST" enctype="multipart/form-data">
    @csrf


    										

    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Customer Name</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control " id="name">
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Customer Email</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="email">
        </div>
    </div>


    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Customer Phone</label>
        <div class="col-sm-10">
            <input type="text" name="phone" class="form-control" id="phone">
        </div>
    </div>


    <div class="form-group row">
        <label for="shopname" class="col-sm-2 col-form-label">Customer Shop Name</label>
        <div class="col-sm-10">
            <input type="text" name="shopname" class="form-control" id="shopname">
        </div>
    </div>



    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Customer Address</label>
        <div class="col-sm-10">
            <input type="text" name="address" class="form-control" id="address">
        </div>
    </div>

    <div class="form-group row">
        <label for="city" class="col-sm-2 col-form-label">Customer City</label>
        <div class="col-sm-10">
            <input type="text" name="city" class="form-control" id="city">
        </div>
    </div>


    <div class="form-group row">
        <label for="account_holder" class="col-sm-2 col-form-label">Account Holder </label>
        <div class="col-sm-10">
            <input type="text" name="account_holder" class="form-control" id="account_holder">
        </div>
    </div>

    <div class="form-group row">
        <label for="account_number" class="col-sm-2 col-form-label">Account Number </label>
        <div class="col-sm-10">
            <input type="text" name="account_number" class="form-control" id="account_number">
        </div>
    </div>


    <div class="form-group row">
        <label for="bank_name" class="col-sm-2 col-form-label">Bank Name </label>
        <div class="col-sm-10">
            <input type="text" name="bank_name" class="form-control" id="bank_name">
        </div>
    </div>
    

    
    <div class="form-group row">
        <label for="bank_branch" class="col-sm-2 col-form-label">Bank Branch  </label>
        <div class="col-sm-10">
            <input type="text" name="bank_branch" class="form-control" id="bank_branch">
        </div>
    </div>

   
    


    <div class="form-group row">
        
        <label for="photo" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="file" name="image" accept="image/*" class="upload" required
                onchange="readURL(this);">
                <img id="image" src="#" />
        </div>
        
    </div>




    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary"> Add Customer</button>
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