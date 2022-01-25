@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
      <div class="content-wrapper">
        
        <div class="card">
               <div class="card-header">
               Edit Brand

               </div>
           <div class="card-body">




                
           <form  action="{{ route('admin.brand.update',$brand->id) }}" method="post" enctype="multipart/form-data" >
                     @csrf

                     @include('backend.partials.messages') 

                      <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $brand->name }}">
                      </div>
                      <div class="form-group">
                              <label for="exampleInputPassword1">Description (Optional)</label>
                              <textarea name="description" class="form-control" cols="80" rows="8" >{!! $brand->description !!}</textarea>
                      </div>



                     


                      <div class="form-group">
                            <label for="old image">Brand Old Image</label> <br> 

                                   <img  src="{{ asset('images/brands/'.$brand->image) }}"  width="100" > <br> 

                            <label for="image">Brand New Image (Optional)</label>  <br> 

                             <input type="file" class="form-control" name="image" id="image" >
                      </div>

                   <button type="submit" class="btn btn-success">Update Brand</button>
              </form> 


      

                
         
           </div>

         </div>

      </div>   
</div>
      <!-- main-panel ends -->
@endsection
      









