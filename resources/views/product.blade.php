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
                        <a href="{{route('home.index')}}">Home</a>
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

            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="{{url('public/uploads')}}/{{$model->image}}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                          
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$model->name}}</h3>
                    
                    @if($model->sale_price>0)
                    <div class="product__details__price">{{number_format($model->sale_price)}} VNĐ</div>
                    @else
                    <div class="product__details__price">{{number_format($model->price)}} VNĐ</div>
                    @endif
                    <p>
                    {{$model->description}}
                    </p>
                    <div class="product__details__quantity">

                    </div>
                   
                    <a href="{{route('cart.add',[$model -> id ])}}" class="primary-btn">ADD TO CARD</a>

                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">

                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Thông tin sản phẩm</h6>
                                <p>{{$model->description}}<p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Thông tin sản phẩm</h6>
                                <p>{{$model->description}}<p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Thông tin sản phẩm</h6>
                                <p>{{$model->description}}<p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Product Section End -->


@stop