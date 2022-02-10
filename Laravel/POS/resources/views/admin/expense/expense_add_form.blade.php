@extends('admin.dashboard')

@section('title')
Add Category
@endsection


@section('dashboard_body')

<form action="{{route('expense_save')}}" method="POST" >

    @csrf

    @include('admin.includes.messages') 

    			

    <div class="form-group row ">
        <label for="details" class="col-sm-2 col-form-label">Expense Details</label>
        <div class="col-sm-10">
            <textarea name="details" id="details" class="form-control" rows="5"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="amount" class="col-sm-2 col-form-label">Amount</label>
        <div class="col-sm-10">
            <input type="text" name="amount" class="form-control" id="amount">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <input type="hidden" name="date" class="form-control" id="date" value="{{ date("d/m/y" )}}">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <input type="hidden" name="month" class="form-control" id="amount" value="{{ date("F" )}}">
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-10">
            <input type="hidden" name="year" class="form-control" id="year" value="{{ date("Y" )}}">
        </div>
    </div>
    

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
    
</form>

@endsection