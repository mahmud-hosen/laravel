@extends('admin.dashboard')

@section('title')
Add Supplier
@endsection


@section('dashboard_body')

@include('admin.includes.messages') 

<div class="text-center">
<h3>ADD SUPPLIER</h3>
</div>

<form action="{{route('insert_supplier')}}" method="POST" enctype="multipart/form-data">
    @csrf


    										

    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Supplier Name</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control " id="name">
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Supplier Email</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="email">
        </div>
    </div>


    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Supplier Phone</label>
        <div class="col-sm-10">
            <input type="text" name="phone" class="form-control" id="phone">
        </div>
    </div>


    <div class="form-group row">
        <label for="shopname" class="col-sm-2 col-form-label">Supplier Shop Name</label>
        <div class="col-sm-10">
            <input type="text" name="shopname" class="form-control" id="shopname">
        </div>
    </div>



    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Supplier Address</label>
        <div class="col-sm-10">
            <input type="text" name="address" class="form-control" id="address">
        </div>
    </div>

    <div class="form-group row">
        <label for="city" class="col-sm-2 col-form-label">Supplier City</label>
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




    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Supplier Type</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type"
                        value="1">
                    <label class="form-check-label" for="type">
                        Distributor
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type"
                        value="2">
                    <label class="form-check-label" for="type">
                        Whole Seller
                    </label>
                </div>


                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type"
                        value="3">
                    <label class="form-check-label" for="type">
                        Brocker
                    </label>
                </div>

            </div>
        </div>
    </fieldset>

   
    


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
            <button type="submit" class="btn btn-primary"> Add Supplier</button>
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