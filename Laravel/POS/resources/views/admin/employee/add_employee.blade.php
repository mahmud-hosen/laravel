@extends('admin.dashboard')

@section('title')
Add Employee
@endsection


@section('dashboard_body')

@include('admin.includes.messages') 

<div class="text-center">
<h3>ADD EMPLOYEES</h3>
</div>

<form action="{{route('insert_employee')}}" method="POST" enctype="multipart/form-data">
    @csrf



    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Employee Name</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control " id="name">
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Employee Email</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="email">
        </div>
    </div>


    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Employee Phone</label>
        <div class="col-sm-10">
            <input type="text" name="phone" class="form-control" id="phone">
        </div>
    </div>


    <div class="form-group row">
        <label for="experience" class="col-sm-2 col-form-label">Employee Experience</label>
        <div class="col-sm-10">
            <input type="text" name="experience" class="form-control" id="experience">
        </div>
    </div>


    <div class="form-group row">
        <label for="salary" class="col-sm-2 col-form-label">Employee Salary</label>
        <div class="col-sm-10">
            <input type="text" name="salary" class="form-control" id="salary">
        </div>
    </div>

    <div class="form-group row">
        <label for="vacation" class="col-sm-2 col-form-label">Employee Vacation</label>
        <div class="col-sm-10">
            <input type="text" name="vacation" class="form-control" id="vacation">
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Employee Address</label>
        <div class="col-sm-10">
            <input type="text" name="address" class="form-control" id="address">
        </div>
    </div>

    <div class="form-group row">
        <label for="city" class="col-sm-2 col-form-label">Employee City</label>
        <div class="col-sm-10">
            <input type="text" name="city" class="form-control" id="city">
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
            <button type="submit" class="btn btn-primary"> Add Employee</button>
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