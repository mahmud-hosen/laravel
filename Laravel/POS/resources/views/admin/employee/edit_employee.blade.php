@extends('admin.dashboard')

@section('title')
EDIT Employee
@endsection


@section('dashboard_body')

<!-- @include('admin.includes.messages')  -->

<div class="text-center">
    <h3>EDIT EMPLOYEES</h3>
</div>

<form action="{{route('employee_update',$employee->id)}}" method="POST" enctype="multipart/form-data">
    @csrf




    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Employee Name</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control " id="name" value="{{$employee->name}}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Employee Email</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="email" value="{{$employee->email}}" required>
        </div>
    </div>


    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Employee Phone</label>
        <div class="col-sm-10">
            <input type="text" name="phone" class="form-control" id="phone" value="{{$employee->phone}}" required>
        </div>
    </div>


    <div class="form-group row">
        <label for="experience" class="col-sm-2 col-form-label">Employee Experience</label>
        <div class="col-sm-10">
            <input type="text" name="experience" class="form-control" id="experience" value="{{$employee->experience}}"
                required>
        </div>
    </div>


    <div class="form-group row">
        <label for="salary" class="col-sm-2 col-form-label">Employee Salary</label>
        <div class="col-sm-10">
            <input type="text" name="salary" class="form-control" id="salary" value="{{$employee->salary}}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="vacation" class="col-sm-2 col-form-label">Employee Vacation</label>
        <div class="col-sm-10">
            <input type="text" name="vacation" class="form-control" id="vacation" value="{{$employee->vacation}}"
                required>
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Employee Address</label>
        <div class="col-sm-10">
            <input type="text" name="address" class="form-control" id="address" value="{{$employee->address}}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="city" class="col-sm-2 col-form-label">Employee City</label>
        <div class="col-sm-10">
            <input type="text" name="city" class="form-control" id="city" value="{{$employee->city}}" required>
        </div>
    </div>




    <div class="form-group row ">
        <label for="image" class="col-sm-2 col-form-label">Employee Old Image</label> <br>

        <img class="ml-3" src="{{ asset('/admin/employees/'.$employee->image) }}" width="100"> <br>
        <input class="w-100" type="hidden"  name="employee_image" value="{{$employee->image}}">

    </div>




    <div class="form-group row">

        <label for="photo" class="col-sm-2 col-form-label">Employee New Image (Optional)</label>
        <div class="col-sm-10">
            <input type="file" name="image" accept="image/*" class="upload" required onchange="readURL(this);">
            <img id="image" src="#" />
        </div>

    </div>




    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary"> Edit Employee</button>
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