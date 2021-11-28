@extends('layouts.site')

@section('title','Đăng ký')

@section('main')


<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">

            <h4>Đăng ký tài khoản</h4>
            <form action="#" method="POST">

                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Tên<span>*</span></p>
                                    <input type="text" name="name">

                                    @error('name')
                                        <small class="error">{{$message}}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="email">

                                    @error('email')
                                        <small class="error">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="number" name="phone">

                                    @error('phone')
                                        <small class="error">{{$message}}</small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Địa chỉ<span>*</span></p>
                                    <input type="text" placeholder="" class="checkout__input__add" name="address">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Mật khẩu<span>*</span></p>
                                    <input type="password" name="password">

                                    @error('password')
                                        <small class="error">{{$message}}</small>
                                    @enderror

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nhập mật khẩu <span>*</span></p>
                                    <input type="password" name="confirm_password">

                                    @error('confirm_password')
                                        <small class="error">{{$message}}</small>
                                    @enderror


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="checkout__input">
                                    <button type="submit" class="site-btn"> Đăng ký</button>
                                </div>
                            </div>
                        </div>

                    </div>
            </form>
        </div>
    </div>
</section>


@stop