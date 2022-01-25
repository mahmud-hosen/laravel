@extends('admin.dashboard')

@section('title')
All Attendence 
@endsection

@section('dashboard_body')


<form action="{{route('category_save')}}" method="POST">
    @csrf

    <!-- Message Show -->

    <table class="table table-border table-hover">
        <thead>
            <tr class="text-center">
                <th>SN</th>
                <th> Attendence  Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($all_attendence as $all_attendence)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td>     <a href="{{route('attendence_view', $all_attendence->edit_date)}}" class="btn btn-success">{{$all_attendence->edit_date}} </a>  </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Button group">

                        <a href="{{route('attendence_delete', $all_attendence->edit_date)}}" class="btn btn-danger">Delete</a>
                        <a href="" class="btn btn-success">Edit</a>
                    </div>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>

    @endsection