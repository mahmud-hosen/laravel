

@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ Session::get('error') }}</p>
  </div>

  @endif

  @if (Session::has('sucess'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ Session::get('sucess') }}</p>
  </div>

  @endif






  



  