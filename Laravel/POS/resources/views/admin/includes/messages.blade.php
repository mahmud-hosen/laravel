@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>{{ Session::get('error') }}</strong> 
</div>

@endif

@if (Session::has('sucess'))

<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <strong>{{ Session::get('sucess') }}</strong> 
</div>

@endif