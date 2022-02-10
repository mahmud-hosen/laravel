@extends('admin.dashboard')

@section('title')
<?php echo $mth ?> EXPENSE 
@endsection

@section('dashboard_body')

<div class="text-center ">
<h2> Totall Expense <?php echo $mth ?>  :  {{$total_exp}}  <a href="{{route('expense_form')}}" class="btn btn-info btn-sm float-right ">ADD NEW</a> </h2>
</div>




<form action="#" method="POST">
    @csrf

    <table class="table table-border table-hover">
        <thead>
            <tr class="text-center">
                <th>SN</th>
                <th>Amount</th>
                <th>Details</th>
                <th>Date</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($today as $today)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td>{{$today->amount}}</td>
                <td>{{$today->details}}</td>
                <td>{{$today->date}}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="Button group">
                    <a href="{{route('expense_edit', $today->id)}}" class="btn btn-success">Edit</a>
                    </div>
                </td>

            </tr>



            @endforeach

        </tbody>
    </table>

    @endsection