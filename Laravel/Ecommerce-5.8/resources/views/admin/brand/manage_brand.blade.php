@extends('admin.dashboard')

@section('title')
Manage Brand 
@endsection

@section('dashboard_body')


<form action="{{route('brand_save')}}" method="POST">
    @csrf

    <!-- Message Show -->
    @include('layouts.messages')

    <table class="table table-border table-hover">
        <thead>
            <tr class="text-center">
                <th>SN</th>
                <th>Brand Name</th>
                <th>Image</th>
                <th>Brand Description</th>
                <th>Create Date</th>
                <th> Publication Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($brands as $brand)



            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td>{{$brand->brand_name}}</td>
                <td> <img  src="{{ asset('admin/brand/'.$brand->image) }}"  width="80" ></td>
                <td>{!!$brand->brand_description!!}</td>
                <td>{{$brand->created_at->diffForHumans()}}</td>
                <!-- Condition 1==Published 0==Unpublished -->
                <td>{{$brand->publication_status == 1 ? 'Published': 'Unpublished'}}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="Button group">

                        @if ($brand->publication_status == 1)
                        <a href="{{ route('unpublished_brand', $brand->id) }}" class="btn btn-primary">Unpublished</a>
                        @else
                        <a href="{{route('published_brand', $brand->id)}}" class="btn btn-primary px-4">Published</a>
                        @endif

                        <a href="{{route('brand_delete', $brand->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('brand_edit', $brand->id)}}" class="btn btn-success">Edit</a>
                    </div>
                </td>

            </tr>



            @endforeach

        </tbody>
    </table>
    {{ $brands->links() }}

    @endsection