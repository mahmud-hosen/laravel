@extends('admin.dashboard')

@section('title')
Add Advance Ssalary
@endsection


@section('dashboard_body')

@include('admin.includes.messages')

<div class="text-center">
    <h3>Add Advance Ssalary
    </h3>
</div>

<form action="{{route('insert_advance_salary')}}" method="POST" enctype="multipart/form-data">
    @csrf



    <div class="form-group row">
        <label for="emp_id" class="col-sm-2 col-form-label">Employee Name </label>
        <div class="col-sm-10">
            <select name="emp_id" class="form-control" id="emp_id">

                <option value="">Please Select Employee Name</option>

                @foreach (App\Employees::orderBY('name', 'asc')->get() as $emp)
                <option value="{{ $emp->id}}"> {{ $emp->name}}</option>
                @endforeach
            </select>
        </div>
    </div>



    <div class="form-group row">
        <label for="month" class="col-sm-2 col-form-label">Month  </label>
        <div class="col-sm-10">
            <select name="month" class="form-control" id="month">

                <option value="">Please Select Month </option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="06June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>

            </select>
        </div>
    </div>

    
    <div class="form-group row">
        <label for="year" class="col-sm-2 col-form-label">Year  </label>
        <div class="col-sm-10">
            <select name="year" class="form-control" id="year">
                <option value="">Please Select year </option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>
        </div>
    </div>


    <div class="form-group row">
        <label for="advance_sarary" class="col-sm-2 col-form-label">Amount Advance Salary Name</label>
        <div class="col-sm-10">
            <input type="text" name="advance_sarary" class="form-control" id="advance_sarary">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary"> Submit </button>
        </div>
    </div>



</form>


@endsection