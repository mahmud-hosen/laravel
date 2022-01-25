@extends('admin.dashboard')

@section('title')
Attendence View Page
@endsection


@section('dashboard_body')
<div class="text-center ">
<h3> Attendence View: {{ $edit_date }}  <a href="{{route('take_attendence')}}" class="btn btn-info btn-sm float-right ">ADD NEW ATTENDENCE</a> </h3>
</div>

<form action="{{route('attendence_update')}}" method="POST">

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

            @foreach ($attendence_view as $view)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td>{{$view->name}}</td>
                <td> <img src="{{ asset('admin/employees/'.$view->image) }}" width="80"></td>
                <input type="hidden" name="id[]" value="{{$view->id}}">

                <td>
                    <input type="radio"  name="attendence[{{$view->id}}]" value="present"  {{$view->attendence == 'present' ? 'checked':''}} required>Present
                    <input type="radio" name="attendence[{{$view->id}}]" value="absence" {{$view->attendence == 'absence' ? 'checked':''}}  required>absence
                </td>
                
            </tr>
            @endforeach
            
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Update Attendence</button>

</form>

@endsection



