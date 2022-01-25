@extends('layouts.website')

@section('content')



<div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3><b>Category</b></h3>
            
            <h5 >{{ $category->name }}</h5>
            @if($category->description)
              <p>{{ $category->description }}</p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-white">
      <div class="container">
        <div class="row">
          @foreach($posts as $post)
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="{{ route('website.post', ['slug' => $post->slug]) }}"><img src="{{ $post->image }}" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-secondary mb-3">{{ $post->category->name}}</span>

              <h2><a href="{{ route('website.post', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left">
                  <img src="@if($post->user->image){{ asset($post->user->image) }} @else {{ asset('website/images/user.jpg') }} @endif" alt="Image" class="img-fluid">
                </figure>
                <span class="d-inline-block mt-1">By <a href="{{ route('website.about') }}">{{ $post->user->name }}</a></span>
                <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d, Y') }}</span>
              </div>
              
                <p>{!! Str::limit($post->description,150) !!}</p>
                <p><a href="{{ route('website.post', ['slug' => $post->slug]) }}">Read More</a></p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
             {{ $posts->links() }}
          </div>
      </div>
    </div>
    </div>

@endsection