@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
      <div class="content-wrapper">
        
        <div class="card">
               <div class="card-header">
               Add Category

               </div>
           <div class="card-body">
                
              <form  action="{{ route('admin.category.store')}}" method="post" enctype="multipart/form-data" >
                     @csrf

                     @include('backend.partials.messages') 

                      <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Category Name">
                      </div>
                      <div class="form-group">
                              <label for="exampleInputPassword1">Description</label>
                              <textarea name="description" class="form-control" cols="80" rows="8" placeholder="Description Text"></textarea>
                      </div>



                      <div class="form-group">
                              <label for="exampleInputPassword1">Parent Category (Optional) </label>
                              <select class="form-control" name="parent_id"> 
                              <option value="">Please Select a Parent Category </option>


                              @foreach ($main_categories as $category)


                              <option value="{{ $category->id}}">{{ $category->name }}</option>

                              @endforeach
                              
                              
                              </select>
 

                      </div>

                      <div class="form-group">
                      <label for="image">Category Image (Optional)</label>

                             <input type="file" class="form-control" name="image" id="image" >
                             </div>

                   <button type="submit" class="btn btn-primary">Add Category</button>
              </form>     
         
           </div>

         </div>

      </div>   
</div>
      <!-- main-panel ends -->
@endsection
      