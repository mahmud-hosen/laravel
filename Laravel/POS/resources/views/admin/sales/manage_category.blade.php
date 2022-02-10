@extends('admin.dashboard')

@section('title')
Manage Category 
@endsection

@section('dashboard_body')


<form action="{{route('category_save')}}" method="POST">
    @csrf

    <!-- Message Show -->

    <table class="table table-border table-hover">
        <thead>
            <tr class="text-center">
                <th>SN</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Category Description</th>
                <th>Create Date</th>
                <th> Publication Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)

            <tr class="text-center ">
                <td>{{$loop->index+1}}</td>
                <td>{{$category->category_name}}</td>
                <td> <img  src="{{ asset('admin/category/'.$category->image) }}"  width="80" ></td>
                <td>{{$category->category_description}}</td>
                <td>{{$category->created_at->diffForHumans()}}</td>
                <!-- Condition 1==Published 0==Unpublished -->
                <td>{{$category->publication_status == 1 ? 'Published': 'Unpublished'}}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="Button group">

                        @if ($category->publication_status == 1)
                        <a href="{{ route('unpublished_category', $category->id) }}" class="btn btn-primary">Unpublished</a>
                        @else
                        <a href="{{route('published_category', $category->id)}}" class="btn btn-primary px-4">Published</a>
                        @endif

                        <a href="{{route('category_delete', $category->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('category_edit', $category->id)}}" class="btn btn-success">Edit</a>
                    </div>
                </td>

            </tr>



            @endforeach

        </tbody>
    </table>
    {{ $categories->links() }}

    @endsection