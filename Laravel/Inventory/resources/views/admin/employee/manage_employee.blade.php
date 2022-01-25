@extends('admin.dashboard')

@section('title')
Employee Manage
@endsection

@section('dashboard_body')

@include('admin.includes.messages')


<div class="text-center">
    <h3>ALL EMPLOYEES</h3>
</div>


<form action="#" method="POST">
    @csrf



    <table class="table table-border table-hover">
        <thead>
            <tr class="text-center">
                <th>SN</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Addess</th>
                <th> Experience</th>
                <th> salary</th>
                <th> vacation</th>
                <th> city</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($all_employees as $employee)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td> <img src="{{ asset('admin/employees/'.$employee->image) }}" width="80"></td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->address}}</td>
                <td>{{$employee->experience}}</td>
                <td>{{$employee->salary}}</td>
                <td>{{$employee->vacation}}</td>
                <td>{{$employee->city}}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{route('employee_edit', $employee->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{route('employee_delete', $employee->id)}}" class="btn btn-danger">Delete</a>


                    </div>
                </td>

            </tr>



            @endforeach

        </tbody>
    </table>
    {{ $all_employees->links() }}

    @endsection