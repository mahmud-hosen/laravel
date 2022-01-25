<div class="widget-area ">
    <ul id="myUL">
        <!-- Title with underline-->


        <div class="main-title-with-underline pb-4 mt-0">
            <h4>categories : {{$category_count}}</h4>
        </div>

        <div class="list-group">

    @foreach (App\Category::orderBY('category_name', 'asc')->where('parent_id',NUll)->get() as $parent)
    <a href="#main-{{ $parent->id}}" class="list-group-item list-group-item-action " data-toggle="collapse">
        <img src="{!! asset('/admin/category/'.$parent->image) !!}" width="50"> {{ $parent->category_name  }} 
 </a>
    <div class="collapse" id="main-{{ $parent->id}}">
        <div class="child-rows">

        
            @foreach (App\Category::orderBY('category_name', 'asc')->where('parent_id', $parent->id)->get() as $child)
            <a href="{!! route('category_product', $child->id) !!}" class="list-group-item list-group-item-action ">
                <img src="{!! asset('/admin/category/'.$child->image) !!}" width="30"> {{ $child->category_name }}
                  
                
            @endforeach
            
        </div>

    </div>
    @endforeach
</div>







        <!-- Title with underline-->
        <div class="main-title-with-underline pb-4">
            <h4>Shop by</h4>
        </div>
        <!---  color options-->
        <li>
            <div class="caret title">color options</div>
            <ul class="nested">
                <li><a href="#">Black <span>(15)</span></a></li>
                <li><a href="#">White <span> (09)</span></a></li>
                <li><a href="#">Blue <span> (12)</span></a></li>
                <li><a href="#">Red<span> (4)</span></a></li>
                <li><a href="#">Screen<span> (05)</span></a></li>
            </ul>
        </li>
        <!---  color options End-->
        <!--- Size options-->
        <li>
            <div class="caret title">Size options</div>
            <ul class="nested">
                <li><a href="#">l <span>(15)</span></a></li>
                <li><a href="#"> m <span> (09)</span></a></li>
                <li><a href="#">s <span> (12)</span></a></li>
                <li><a href="#">xl<span> (4)</span></a></li>
            </ul>
        </li>
        <!---  Size options End-->




        <li>
            <div class="caret title">Beverages</div>
            <ul class="nested">
                <li><a href="#">Chairs</a></li>
                <li><a href="#">Storage</a></li>
                <li>
                    <div class="caret">Tea</div>
                    <ul class="nested">
                        <li><a href="#">Chairs</a></li>
                        <li><a href="#">Storage</a></li>
                        <li>
                            <div class="caret">Green Tea</div>
                            <ul class="nested">
                                <li><a href="#">Chairs</a></li>
                                <li><a href="#">Tables</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">Storage</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>


        <div class="main-title-with-underline pb-4">
            <h4>Compare</h4>
        </div>

        <li>

            <div class="caret title">Beverages</div>


            <ul class="nested">

                <li>
                    <div class="caret">Tea</div>
                    <ul class="nested">
                        <li><a href="#">l <span>(15)</span></a></li>
                        <li><a href="#"> m <span> (09)</span></a></li>
                    </ul>
                </li>


            </ul>

        </li>
        <!---  Color option-->
        <li>
            <div class="caret title">color options</div>
            <ul class="nested">
                <li><a href="#">Black <span>(15)</span></a></li>
                <li><a href="#">White <span> (09)</span></a></li>
                <li><a href="#">Blue <span> (12)</span></a></li>
                <li><a href="#">Red<span> (4)</span></a></li>
                <li><a href="#">Screen<span> (05)</span></a></li>

            </ul>
        </li>



    </ul>
</div>