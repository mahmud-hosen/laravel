<!DOCTYPE html>
<html lang="en">

<head>
  <title> 
  @yield('title', 'Laravel Ecommerce Project')
  </title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 

  <link rel="stylesheet" href="{{ asset('footer.css') }}" >

  <link rel="stylesheet" href="{{ asset('style.css') }}" >


  @include('frontend.partials.styles')


</head>
   
<body>
    
<div class="wrapper">

@include('frontend.partials.nav')

@yield('content')

@include('frontend.partials.footer')

</div>

@include('frontend.partials.scripts')
</body>
</html>


