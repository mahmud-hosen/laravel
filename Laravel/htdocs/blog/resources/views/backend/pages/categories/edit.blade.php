@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
      <div class="content-wrapper">
        
        <div class="card">
               <div class="card-header">
               Edit Category

               </div>
           <div class="card-body">




                
           <form  action="{{ route('admin.category.update',$category->id) }}" method="post" enctype="multipart/form-data" >
                     @csrf

                     @include('backend.partials.messages') 

                      <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $category->name }}">
                      </div>
                      <div class="form-group">
                              <label for="exampleInputPassword1">Description (Optional)</label>
                              <textarea name="description" class="form-control" cols="80" rows="8" >{!! $category->description !!}</textarea>
                      </div>



                      <div class="form-group">
                              <label for="exampleInputPassword1">Parent Category (Optional) </label>
                              <select class="form-control" name="parent_id"> 
                              <option value="">Please Select a Primary Category </option>


                              @foreach ($main_categories as $cat)

                              <option value="{{ $cat->id}}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>

                              @endforeach
                              
                              </select>
                      </div>


                      <div class="form-group">
                            <label for="old image">Category Old Image</label> <br> 

                                   <img  src="{{ asset('images/categories/'.$category->image) }}"  width="100" > <br> 

                            <label for="image">Category New Image (Optional)</label>  <br> 

                             <input type="file" class="form-control" name="image" id="image" >
                      </div>

                   <button type="submit" class="btn btn-success">Update Category</button>
              </form> 


      

                
         
           </div>

         </div>

      </div>   
</div>
      <!-- main-panel ends -->
@endsection
      