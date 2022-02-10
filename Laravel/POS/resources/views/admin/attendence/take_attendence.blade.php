@extends('admin.dashboard')

@section('title')
Attendence Page
@endsection


@section('dashboard_body')
<div class="text-center ">
<h3> ATTENDENCE DATE : {{ date("j-M-Y")}}  <a href="{{route('all_attendence')}}" class="btn btn-info btn-sm float-right ">ALL ATTENDENCE</a> </h3>
</div>

<form action="{{route('attendence_save')}}" method="POST">

    @csrf

    @include('admin.includes.messages')


    <table class="table table-border table-hover">
        <thead>
            <tr class="text-center">
                <th>SN</th>
                <th>Name</th>
                <th>Image</th>
                <th>Attendence</th>
            </tr>
        </thead>
        <tbody>

        <form action="{{route('attendence_save')}}" method="POST">

@csrf
            @foreach ($employees as $employee)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td>{{$employee->name}}</td>
                <td> <img src="{{ asset('admin/employees/'.$employee->image) }}" width="80"></td>

                <input type="hidden" name="user_id[]" value="{{$employee->id}}">

                <td>

                    <input type="radio" name="attendence[{{$employee->id}}]" value="present" required>Present
                    <input type="radio" name="attendence[{{$employee->id}}]" value="absence" required>absence

                </td>

                <input type="hidden" name="att_date" value="{{ date("d/m/y")}}">
                <input type="hidden" name="att_year" value="{{ date("Y")}}">

            </tr>



            @endforeach
            

        </tbody>
    </table>


    <button type="submit" class="btn btn-primary">Take Attendence</button>

</form>

@endsection