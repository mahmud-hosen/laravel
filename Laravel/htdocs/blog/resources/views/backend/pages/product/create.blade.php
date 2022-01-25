@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
      <div class="content-wrapper">
        
        <div class="card">
               <div class="card-header">
               Add Product

               </div>
           <div class="card-body">
                
              <form  action="{{ route('admin.product.store')}}" method="post" enctype="multipart/form-data" >
                     {{ csrf_field()}}

                     @include('backend.partials.messages') 

                      <div class="form-group">
                             <label for="exampleInputEmail1">Title</label>
                             <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter Text">
                      </div>
                      <div class="form-group">
                              <label for="exampleInputPassword1">Description</label>
                              <textarea name="description" class="form-control" cols="80" rows="8" placeholder="Description Text"></textarea>
                      </div>


                      <div class="form-group">
                             <label for="exampleInputEmail1">Price</label>
                             <input type="number" class="form-control" name="price" id="price" aria-describedby="emailHelp" placeholder="Price">
                      </div>

                      <div class="form-group">
                             <label for="exampleInputEmail1">Quantity</label>
                             <input type="number" class="form-control" name="quantity" id="quantity" aria-describedby="emailHelp" placeholder="Quantity">
                      </div>

                      

                      <div class="form-group">
                             <label for="exampleInputEmail1">Select Category</label>
                             <select name="category_id" class="form-control">
                             <option value="" >Please select a category for the product</option>
                                 @foreach (App\Models\Category::orderBY('name', 'asc')->where('parent_id',NUll)->get() as $parent)
                                    <option value="{{ $parent->id}}" >{{ $parent->name}}</option>  

                                          @foreach (App\Models\Category::orderBY('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                                              <option value="{{ $child->id}}" > ------> {{ $child->name}}</option>  
                                          @endforeach

                                 @endforeach

                             </select>
                      </div>



                      <div class="form-group">
                             <label for="exampleInputEmail1">Select Brand</label>
                             <select name="brand_id" class="form-control">
                             <option value="" >Please select a brand for the product</option>
                                 @foreach (App\Models\Brand::orderBY('name', 'asc')->get() as $brand)
                                    <option value="{{ $brand->id}}" >{{ $brand->name}}</option>  

       
                                          
                                 @endforeach

                             </select>
                      </div>




                      

                      <div class="form-group">
                             <label for="exampleInputEmail1">admin_id</label>
                             <input type="number" class="form-control" name="admin_id" id="admin_id" aria-describedby="emailHelp" placeholder="Admin_Id">
                      </div>
                      






                      
                      <div class="form-group">
                             <label for="exampleInputEmail1">Product Image</label>
                             
                             <div class="row">
                             
                             <div class="col-md-4">
                             <input type="file" class="form-control" name="product_image[]" id="product_image" >
                             </div>


                             <div class="col-md-4">
                             <input type="file" class="form-control" name="product_image[]" id="product_image" >
                             </div>


                             <div class="col-md-4">
                             <input type="file" class="form-control" name="product_image[]" id="product_image" >
                             </div>

                           
                        
                             
                             </div>

                      </div>











                   <button type="submit" class="btn btn-primary">Add Product</button>
              </form>


      

                
         
           </div>

         </div>

      </div>   
</div>
      <!-- main-panel ends -->
@endsection
      