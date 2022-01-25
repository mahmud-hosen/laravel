@extends('admin.dashboard')

@section('title')
Manage Product
@endsection

@section('dashboard_body')


<form action="{{route('product_save')}}" method="POST">
    @csrf

    <!-- Message Show -->
    @include('layouts.messages')

    <table class="table table-border table-hover  table-responsive">
        <thead>
            <tr class="text-center">
                <th>SN</th>
                <th> Product Name</th>
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

            @foreach ($products as $product)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_short_description}}</td>
                <td>{{$product->product_long_description}}</td>
                <td>{{$product->product_price}}</td>
                <td> <img  src="{{ asset('images/'.$product->image) }}"  width="80" ></td>

                <!-- <td>{{$product->created_at? $product->created_at->diffForHumans() : 'No Date'}}</td> -->

                <td>{{$product->created_at? $product->created_at->format('D-M-Y h:i:sa') : 'No Date'}}</td>
                <td>{{$product->publication_status == 1 ? 'Published': 'Unpublished'}}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="Button group">

                        @if ($product->publication_status == 1)
                        <a href="{{ route('unpublished_product', $product->id) }}"
                            class="btn btn-primary">Unpublished</a>
                        @else
                        <a href="{{ route('published_product', $product->id) }}"
                            class="btn btn-primary px-4">Published</a>
                        @endif

                        <a href="{{route('product_delete', $product->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('product_edit', $product->id)}}" class="btn btn-success">Edit</a>
                    </div>
                </td>
            </tr>


            @endforeach

        </tbody>
    </table>
    {{ $products->links() }}


    <!-- Soft Delete Product / Show delete product -->
    <!-- ------------------------------------------ -->

</form>
@endsection