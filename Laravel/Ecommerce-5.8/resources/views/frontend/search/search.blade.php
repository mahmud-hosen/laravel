@extends('layouts.frontend_master')


@section('title')
Shop Page
@endsection


@section('content')


<!-- Page Title area start -->
<div class="page-tile-area py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page Title area start -->
<div class="shop-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <!-- widget with Number start -->

                @include('frontend.includes.shop_widget')


                <!-- widget Number End  -->

            </div> <!-- Col-3  end-->
            <div class="col-lg-9">
                <!-- Banner area start  -->
                <div class="banner-area">
                    <img src="{{asset('')}}img/banner-img/banner2.jpg" alt="" class="img-fluid">
                </div>
                <!-- Banner area  End-->
                <!-- List view and grid view tab start-->
                <div class="shop-layout-area py-5">
                    <div class="shop-layout-bar clearfix ">
                        <ul class="nav shop-tap" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active " data-toggle="tab" href="#grid-view" role="tab">
                                    <i class="fas fa-th-large"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-toggle="tab" href="#list-view" role="tab">
                                    <i class="fas fa-list"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="filter-section">
                            <select name="" id="">
                                <option value="#">Default short</option>
                                <option value="#">Default short</option>
                                <option value="#">Default short</option>
                                <option value="#">Default short</option>
                                <option value="#">Default short</option>
                            </select>
                        </div>
                        <div class="showing-result">
                            <span>Showing 1-12 of 30 relults</span>
                        </div>

                    </div>
                    <!-- tab content-->
                    <div class="tab-content pt-4">
                        <!-- tab grid content-->
                        <div class="tab-pane fade active show" id="grid-view" role="tabpanel">
                            <div class="row">

                                @foreach($all_products as $all_product)

                                <!--Single product start-->

                                <div class="col-md-4">
                                    <div class="product-wrapper">
                                        <div class="product-img">

                                            <a href="{{route('product_details', $all_product->id)}}"> <img
                                                    src="{{ asset('images/'.$all_product->image) }}" alt=""></a>

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
                                            <h3><a
                                                    href="{{route('product_details', $all_product->id)}}">{{$all_product->product_name}}</a>
                                            </h3>
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

                                </div>

                                <!--Single product End-->
                                @endforeach
                            </div>
                            {{ $all_products->links() }}
                        </div>



                        <!-- tab list content-->
                        <div class="tab-pane fade " id="list-view" role="tabpanel">


                            <!--Single product start-->
                            @foreach($all_products as $all_product)
                            <div class="row pb-4">
                                <div class="col-md-4">
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="#"> <img src="{{ asset('images/'.$all_product->image) }}"
                                                    alt=""></a>
                                            <a href="{{route('product_details', $all_product->id)}}"> <img
                                                    class="secondary-img"
                                                    src="{{asset('')}}img/product-img/product1.jpg" alt=""></a>
                                            <span>hot</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="product-content-list">
                                        <h3><a
                                                href="{{route('product_details', $all_product->id)}}">{{$all_product->product_name}}</a>
                                        </h3>
                                        <p> {{$all_product->product_short_description}} </p>
                                        <div class="rating-list">
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <i class="fas far fa-star"></i>
                                            <span>3 Reating(s) | Add Your Reating(s)</span>
                                        </div>
                                        <div class="price-list">
                                            <span>$ {{$all_product->product_price}} </span>
                                        </div>
                                        <div class="cart-and-action">
                                            <div class="cart-btn-list">
                                                <a href="{{route('product_details', $all_product->id)}}">Add to cart</a>
                                            </div>
                                            <div class="product-action-list">
                                                <a href="#"><i class="far fa-eye"></i></a>
                                                <a href="#"><i class="fas fa-balance-scale"></i></a>
                                                <a href="#"><i class="fas fa-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!-- {{ $all_products->links() }} -->
                            <!--Single product End-->
                        </div>
                    </div>
                </div>
                <!-- List view and grid view tab End-->
            </div>
        </div>
    </div>
</div>










@endsection