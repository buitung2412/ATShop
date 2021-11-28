@extends('layouts.site')

@section('title','Trang chủ')

@section('main')

<div ng-app="home" ng-controller="homeController">
    <!-- Hero Section Begin -->
    <section class="hero">
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
                            <li><a href="{{route('category',['id'=>$cat->id,'slug'=> Str::slug($cat->name)])}}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{route('search')}}">

                                <input type="text" placeholder="Tìm Kiếm" name="key">
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
                    <div class="hero__item set-bg" data-setbg="{{url('public/site')}}/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Nhận và giao hàng miễn phí</p>
                            <a href="{{route('home.shop')}}" class="primary-btn">MUA NGAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($new_products as $np )

                    <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{url('public/uploads')}}/{{$np->image}}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="{{route('cart.add',['id'=> $np -> id ])}}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{route('product',['id'=>$np->id,'slug'=>Str::slug($np->name)])}}">{{$np->name}}</a></h6>
                                @if($np->sale_price>0)
                                <h5>{{number_format($np->sale_price)}} VNĐ</h5>
                                @else
                                <h5>{{number_format($np->price)}} VNĐ</h5>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản Phẩm Mới</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li ng-repeat="cat in cats" ng-click="get_product_of_cat(cat.id)"> <%cat.name%> </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat" ng-repeat ="pro in productByCats">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{url('public/uploads')}}/<%pro.image%>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><%pro.name%></a></h6>
                            <h5><%pro.price | currency:"":0%> VNĐ</h5>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{url('public/site')}}/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{url('public/site')}}/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@stop()

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>

<script>


    var app = angular.module('home', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

    
    app.controller('homeController', function($scope, $http) {

        $http.get('http://localhost/Web/api/category').then(function(res) {

            $scope.cats = res.data;

        })

        function get_product_of_cat (cid){
            $http.get('http://localhost/Web/api/product-cat/'+ cid).then(function(res){
                $scope.productByCats = res.data;
            });
        }

        get_product_of_cat(4);

        $scope.get_product_of_cat = function(cid)
        {
            get_product_of_cat(cid);
        }

    })
</script>


@stop
