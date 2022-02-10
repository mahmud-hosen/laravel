@extends('admin.dashboard')

@section('title')
Manage Delete Product
@endsection

@section('dashboard_body')


<form action="{{route('product_save')}}" method="POST">
    @csrf

    <!-- Message Show -->
    @include('layouts.messages')


    <!-- Soft Delete Product / Show delete product -->
    <!-- ------------------------------------------ -->
<h2 class="text-center">Delete Product</h2>
    <table class="table table-border table-hover  table-responsive">
        <thead>
            <tr class="text-center">
                <th>SN</th>
                <th> Product Name</th>
                <th> Category ID</th>
                <th>product_short_description</th>
                <th> product_long_description</th>
                <th> product_price</th>
                <th> Image</th>
                <th> created_at</th>
                <th> publication_status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($soft_delete_products as $delete_product)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td>{{$delete_product->product_name}}</td>
                <td>{{$delete_product->category_id}}</td>
                <td>{{$delete_product->product_short_description}}</td>
                <td>{{$delete_product->product_long_description}}</td>
                <td>{{$delete_product->product_price}}</td>
                <td> <img  src="{{ asset('images/'.$delete_product->image) }}"  width="80" ></td>
                <td>{{$delete_product->created_at}}</td>

                <td>{{$delete_product->publication_status == 1 ? 'Published': 'Unpublished'}}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="Button group">

                
                        <a href="{{route('restore_product', $delete_product->id)}}" class="btn btn-success">Restore</a>
                        <a href="{{route('force_delete_product', $delete_product->id)}}" class="btn btn-danger">Permanent Delete</a>

                    </div>
                </td>
            </tr>


            @endforeach

        </tbody>
    </table>
    {{ $soft_delete_products->links() }}


</form>

@endsection