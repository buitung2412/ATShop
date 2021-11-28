@extends('layouts.site')

@section('title',$model->name)

@section('main')



<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh sách sản phẩm</span>
                    </div>
                    <ul>
                        @foreach($cats as $cat)
                        <li><a href="{{route('category',['id'=>$cat->id,'slug'=>Str::slug($cat->name)])}}">{{$cat->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{route('search')}}">
                            <input type="text" placeholder="Tìm Kiếm">
                            <button type="submit" class="site-btn">Tìm Kiếm</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>0987654321</h5>
                            <span>Hỗ trợ 24/7 </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{url('public/site')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{$model->name}}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home.index')}}">Trang chủ</a>
                        <span>{{$model->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh sách sản phẩm</h4>
                        <ul>
                            @foreach($cats as $cat)
                            <li><a href="{{route('category',['id'=>$cat->id,'slug'=>Str::slug($cat->name)])}}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sản phẩm khuyến mãi</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">

                            @foreach($sale_pro as $sp)
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" 
                                    data-setbg="{{url('public/uploads')}}/{{$sp->image}}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{route('cart.add',['id'=> $sp -> id ])}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span></span>
                                        <h5><a href="{{route('product',['id'=>$sp->id,'slug'=>Str::slug($sp->name)])}}">{{$sp->name}}</a></h5>
                                        <div class="product__item__price">{{number_format($sp->sale_price)}} <span>{{number_format($sp->price)}}</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->


@stop