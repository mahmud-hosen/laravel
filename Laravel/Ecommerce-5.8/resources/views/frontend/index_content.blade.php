@extends('layouts.frontend_master')


@section('title')
Home Page
@endsection


@section('content')

<!-- Carosel Area start-->

<section class="carousel-section pb-5">
    <div class="container">
        <div class="slider-active">
            <div class="slider-single-item">
                <img src="img/slider-img2.jpg" class="img-fluid" alt="no image">
                <div class="slider-text">
                    <h2>Cherner <span>Armchair</span></h2>
                    <p>The 1958 moulded plywood armchair by Norman Cherner.</p>
                    <a href="#">View now</a>
                </div>
            </div>
            <div class="slider-single-item">
                <img src="img/slider-img2.jpg" class="img-fluid" alt="">
                <div class="slider-text">
                    <h2>Cherner <span>Armchair</span></h2>
                    <p>The 1958 moulded plywood armchair by Norman Cherner.</p>
                    <a href="#">View now</a>
                </div>
            </div>
            <div class="slider-single-item">
                <img src="img/slider-img3.jpg" class="img-fluid" alt="">
                <div class="slider-text">
                    <h2>Cherner <span>Armchair</span></h2>
                    <p>The 1958 moulded plywood armchair by Norman Cherner.</p>
                    <a href="#">View now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Carosel Area end-->

<!-- normal product area -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Latest Product</h3>
            </div>
        </div>
        <div class="row">
            <!--Single product start-->
            @foreach ($latest_products as $latest_product)

            <div class="col-md-3">

                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="{{route('product_details', $latest_product->id)}}"> <img src="{{ asset('images/'.$latest_product->image) }}" alt=""></a>
                        <!-- <a href="#"> <img class="secondary-img" src="img/product-img/product1.jpg" alt=""></a> -->
                        <span>Hot</span>
                        <div class="product-action">
                            <a href="#"><i class="far fa-eye"></i></a>
                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h3><a href="{{route('product_details', $latest_product->id)}}">{{$latest_product->product_name}}</a></h3>
                        <div class="rating">
                            <i class="fas far fa-star"></i>
                            <i class="fas far fa-star"></i>
                            <i class="fas far fa-star"></i>
                            <i class="fas far fa-star"></i>
                            <i class="fas far fa-star"></i>
                        </div>
                        <div class="price">
                            <span>$ {{$latest_product->product_price}} </span>
                            <span><del>$239.9</del></span>
                        </div>
                        <div class="cart-btn">
                            <form action="" method="POST" class="cart-and-action">
                                <div class="">
                                    <div class="float-left">
                                        <input type="hidden" name="product_quantity" value="1">
                                        <input type="hidden" name="product_id" value="">
                                    </div>
                                </div>
                                <div class="cart-pro">
                                     <a href="{{route('product_details', $latest_product->id)}}">Add to cart</a>
                                    <!-- <button  class="btn btn-outline-dark btn-lg " type="submit">Add to cart</button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            @endforeach

            <!--Single product End-->

        </div>
    </div>
</section>

<!--Product Area-->
<section class="product-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="product-tab cat_product">
                    <ul class="nav" role="tablist">
                        <li class="nav-item  pb-5">
                            <a class="nav-link active" data-toggle="tab" href="#allproduct" role="tab">All</a>
                        </li>

                        @foreach($all_categories as $all_categorie)

                        <li class="nav-item  pb-5">
                            <a class="nav-link" data-toggle="tab" href="#tab{{$all_categorie->id}}"
                                role="tab">{{$all_categorie->category_name}}</a>
                        </li>

                        @endforeach


                    </ul>
                    <div class="tab-content">

                        <!--Tab start-->
                        <div class="tab-pane fade show active" id="allproduct" role="tabpanel">
                            <!--owl-carousel start-->
                            <div class="product-active owl-carousel nav-style">

                                @foreach($all_products as $all_product)


                                <!--Single product start-->
                                <div class="product-wrapper">
                                    <div class="product-img">
                                    <a href="{{route('product_details', $all_product->id)}}"> <img src="{{ asset('images/'.$all_product->image) }}" alt=""></a>
                                        <!-- <a href="#"> <img class="secondary-img" src="img/product-img/product1.jpg" -->
                                                alt=""></a>
                                        <span>hot</span>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="{{route('product_details', $all_product->id)}}"> {{$all_product->product_name}}</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ {{$all_product->product_price}} </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                        <a href="{{route('product_details', $all_product->id)}}">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Single product End-->

                               

                                @endforeach
                            </div>
                            <!--owl-carousel end-->
                        </div>
                        <!--Tab end-->







                    
                        @foreach($all_categories as $all_categorie)
                        <!--Tab start-->
                        <div class="tab-pane fade" id="tab{{$all_categorie->id}}" role="tabpanel">
                            <!--owl-carousel start-->
                            <div class="product-active owl-carousel nav-style">

                                @foreach($all_products as $all_product)

                                @if($all_categorie->id == $all_product->category_id)

                                <!--Single product start-->
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="{{ asset('images/'.$all_product->image) }}" alt=""></a>
                                        <a href="#"> <img class="secondary-img" src="img/product-img/product1.jpg"
                                                alt=""></a>
                                        <span>hot</span>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">{{$all_product->product_name}}</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ {{$all_product->product_price}} </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                        <a href="{{route('product_details', $all_product->id)}}">Add to cart</a>
                                            <!-- <a href="#">Add to cart</a> -->
                                        </div>
                                    </div>
                                </div>
                                <!--Single product End-->

                                @endif

                                @endforeach
                            </div>
                            <!--owl-carousel end-->
                        </div>
                        <!--Tab end-->
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Banner Area-->
<div class="banner-area pb-5">
    <div class="container">
        <div class="banner-img">
            <a href="#"><img class="img-fluid" src="img/banner-img/banner.jpg" alt=""></a>
        </div>
    </div>
</div>
<!--Product Area-->
<section class="product-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="product-tab">
                    <ul class="nav" role="tablist">
                        <li class="nav-item  pb-5">
                            <a class="nav-link active" id="l1" data-toggle="tab" href="#furniture1"
                                role="tab">Furniture</a>
                        </li>
                        <li class="nav-item pb-5">
                            <a class="nav-link" data-toggle="tab" id="l2" href="#lighting1" role="tab">Lighting</a>
                        </li>
                        <li class="nav-item pb-5">
                            <a class="nav-link" data-toggle="tab" id="l3" href="#sofas1" role="tab">Sofas</a>
                        </li>
                        <li class="nav-item pb-5">
                            <a class="nav-link" data-toggle="tab" id="l4" href="#all1" role="tab">All</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="furniture1" role="tabpanel" aria-labelledby="l1">
                            <div class="product-active owl-carousel nav-style">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product1.jpg" alt=""></a>
                                        <a href="#"> <img class="secondary-img" src="img/product-img/product2.jpg"
                                                alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <a href="#"> <img class="secondary-img" src="img/product-img/product2.jpg"
                                                alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="lighting1" role="tabpanel" aria-labelledby="l2">
                            <div class="product-active owl-carousel nav-style">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product1.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sofas1" role="tabpanel" aria-labelledby="l3">
                            <div class="product-active owl-carousel nav-style">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product1.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="all1" role="tabpanel" aria-labelledby="l4">
                            <div class="product-active owl-carousel nav-style">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product1.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#"> <img src="img/product-img/product3.jpg" alt=""></a>
                                        <div class="product-action">
                                            <a href="#"><i class="far fa-eye"></i></a>
                                            <a href="#"><i class="fas fa-balance-scale"></i></a>
                                            <a href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h3><a href="#">Water Repellent Parka</a></h3>
                                        <div class="rating">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <span>$ 229.9 </span>
                                            <span><del>$239.9</del></span>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Subcribe-section start-->
<section class="subscribe-section  ">
    <div class="container">
        <div class="subscribe text-center py-5">
            <div class="rwo py-5">
                <div class="col-12 ">
                    <h2>KEEP UPDATED</h2>
                    <p>Sign up for our newletter to recevie updates an exlusive offers</p>
                </div>
                <div class="col-12 ">
                    <div class="input-group w-50  mx-auto pt-4">
                        <input type="text" placeholder="Enter Your Email" aria-label="Recipient's "
                            aria-describedby="my-addon">
                        <div class="input-group-append">
                            <span class="subscribe-text" id="my-addon">Subscribe</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Subcribe-section End-->
<!--Brand-section start-->
<div class="brand-section">
    <div class="container ">
        <div class="row">
            <div class="brand-active owl-carousel ">
                <div class="single-brand"><a href=""><img src="img/brand/brand1.jpg" alt="" class=""></a></div>
                <div class="single-brand"><a href=""><img src="img/brand/brand1.jpg" alt="" class=""></a></div>
                <div class="single-brand"><a href=""><img src="img/brand/brand1.jpg" alt="" class=""></a></div>
                <div class="single-brand"><a href=""><img src="img/brand/brand1.jpg" alt="" class=""></a></div>
                <div class="single-brand"><a href=""><img src="img/brand/brand1.jpg" alt="" class=""></a></div>
            </div>
        </div>
    </div>
</div>
<!--Brand-section End-->
@endsection