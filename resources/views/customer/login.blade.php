@extends('layouts.site')

@section('title','Đăng Nhập')

@section('main')


<section class="checkout spad">
    <div class="container">

        @if(Session::has('error'))

        <div class="alert alert-danger" role="alert">
            <p>{{Session::get('error')}}</p>
        </div>

        @endif
        <div class="checkout__form">

            <h4>Đăng nhập </h4>
            <form action="#" method="POST">

                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">

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
                                    <p>Password<span>*</span></p>
                                    <input type="password" name="password">

                                    @error('password')
                                    <small class="error">{{$message}}</small>
                                    @enderror

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="checkout__input">
                                    <button type="submit" class="site-btn"> Đăng nhập</button>
                                </div>
                            </div>
                        </div>

                    </div>
            </form>
        </div>
    </div>
</section>


@stop