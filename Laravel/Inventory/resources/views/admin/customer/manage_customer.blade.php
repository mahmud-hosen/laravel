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

    
    <table class="table table-border table-hover table-responsive">
        <thead>
            <tr class="text-center">
                <th>SN</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Addess</th>
                <th>Shop Name</th>
                <th> Account Holder</th>
                <th> Account Number</th>

                <th> Bank Name</th>
                <th> Bank Branch</th>

                <th> City</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($customers as $customer)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td> <img  src="{{ asset('admin/customers/'.$customer->image) }}"  width="80" ></td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->shopname}}</td>
                <td>{{$customer->account_holder}}</td>
                <td>{{$customer->account_number}}</td>
                <td>{{$customer->bank_name}}</td>
                <td>{{$customer->bank_branch}}</td>
                <td>{{$customer->city}}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{route('customer_edit', $customer->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{route('customer_delete', $customer->id)}}" class="btn btn-danger">Delete</a>


                    </div>
                </td>

            </tr>



            @endforeach

        </tbody>
    </table>
    {{ $customers->links() }}

    @endsection