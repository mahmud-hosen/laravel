@extends('admin.dashboard')

@section('title')
Customer Manage  
@endsection

@section('dashboard_body')

@include('admin.includes.messages') 


<div class="text-center">
<h3>ALL CUSTOMER</h3>
</div>



<form action="#" method="POST">
    @csrf



month
year
status
advance_sarary
    
    <table class="table table-border table-hover table-responsive">
        <thead>
            <tr class="text-center">
                <th>SN</th>
                <th>Image</th>
                <th>Name</th>
                <th>Root Salary</th>
                <th>advance_sarary</th>
                <th>month</th>
                <th>year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($adv_salary as $adv_salary)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td> <img  src="{{ asset('admin/employees/'.$adv_salary->image) }}"  width="80" ></td>
                <td>{{$adv_salary->name}}</td>
                <td>{{$adv_salary->salary}}</td>
                <td>{{$adv_salary->advance_sarary}}</td>
                <td>{{$adv_salary->month}}</td>
                <td>{{$adv_salary->year}}</td>
            
                <td>
                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>


                    </div>
                </td>

            </tr>



            @endforeach

        </tbody>
    </table>

    @endsection