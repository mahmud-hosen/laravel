@extends('admin.dashboard')

@section('title')
Pay Salary   
@endsection

@section('dashboard_body')

@include('admin.includes.messages') 


<div class="text-center">
<h2>Pay Salary</h2>
<h5>{{ date("F Y") }}</h5>
</div>



<form action="#" method="POST">
    @csrf


    <table class="table table-border table-hover table-responsive">
        <thead>
            <tr class="text-center">
                <th>SN</th>
                <th>Image</th>
                <th>Name</th>
                <th>Root Salary</th>
               
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($employes as $employe)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td> <img  src="{{ asset('admin/employees/'.$employe->image) }}"  width="80" ></td>
                <td>{{$employe->name}}</td>
                <td>{{$employe->salary}}</td>
                
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