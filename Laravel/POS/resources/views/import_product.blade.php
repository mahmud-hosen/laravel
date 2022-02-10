@extends('admin.dashboard')

@section('title')
Add Category
@endsection


@section('dashboard_body')

<div class="text-center ">
   <h3>   Product Import
       <a href="{{route('export')}}" class="btn btn-danger btn-sm float-right mr-1 ">Download Xlsx</a>

  </h3>
</div>




<form action="{{route('import')}}" method="POST" enctype="multipart/form-data">

    @csrf


    <div class="form-group row">
        <label for="category_name" class="col-sm-2 col-form-label">Xlsx File  Import</label>
        <div class="col-sm-10">
            <input type="file" name="import_file" >
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary"> Upload</button>
        </div>
    </div>
    
</form>

@endsection