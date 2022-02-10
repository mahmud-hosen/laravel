@extends('admin.dashboard')

@section('title')
 Manage  Supplier
@endsection

@section('dashboard_body')

@include('admin.includes.messages') 


<div class="text-center">
<h3>ALL SUPPLIER</h3>
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
                <th> Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($Suppliers as $Supplier)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td> <img  src="{{ asset('admin/Suppliers/'.$Supplier->image) }}"  width="80" ></td>
                <td>{{$Supplier->name}}</td>
                <td>{{$Supplier->email}}</td>
                <td>{{$Supplier->phone}}</td>
                <td>{{$Supplier->address}}</td>
                <td>{{$Supplier->shopname}}</td>
                <td>{{$Supplier->account_holder}}</td>
                <td>{{$Supplier->account_number}}</td>
                <td>{{$Supplier->bank_name}}</td>
                <td>{{$Supplier->bank_branch}}</td>
                <td>{{$Supplier->city}}</td>
                <td> {{$Supplier->type == 1 ? 'Distributor':''}} {{$Supplier->type == 2 ? 'Whole Seller':''}} {{$Supplier->type == 3 ? 'Brocker':''}}</td>

               
                <td>
                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{route('Supplier_edit', $Supplier->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{route('Supplier_delete', $Supplier->id)}}" class="btn btn-danger">Delete</a>


                    </div>
                </td>

            </tr>



            @endforeach

        </tbody>
    </table>
    {{ $Suppliers->links() }}

    @endsection