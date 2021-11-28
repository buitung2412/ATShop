<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url('public/site')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{url('public/site')}}/img/AT.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span></span></a></li>
                <li><a href="{{route('cart.view')}}"><i class="fa fa-shopping-bag"></i> <span>{{$cart->totalQuantity}}</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>{{number_format($cart->totalPrice)}}</span></div>
        </div>
        <div class="humberger__menu__widget">

            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Đăng nhập</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{route('home.index')}}">Trang Chủ</a></li>
                <li><a href="{{route('home.shop')}}">Cửa Hàng</a></li>
                <li><a href="{{route('home.blog')}}">Blog</a></li>
                <li><a href="{{route('home.contact')}}">Liên Hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> anhtung@gmail.com</li>
                <li>Miễn phí ship đơn hàng 1000000 VNĐ</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> anhtung@gmail.com</li>
                                <li>Miễn phí ship đơn hàng 1000000 VNĐ</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>

                            <div class="header__top__right__language header__top__right__auth">

                                @if(Auth::guard('account') ->check())

                                <div><i class="fa fa-user"></i> Xin chào: {{Auth::guard('account')->user()->name}}</div>
                                <ul>
                                    <li><a href="{{route('customer.profile')}}">Thông tin tài khoản</a></li>
                                    <!-- <li><a href="">Thay đổi mật khẩu</a></li> -->
                                    <li><a href="{{route('cart.my_order')}}">Giỏ hàng của tôi</a></li>
                                </ul>
                                <div><a href="{{route('customer.logout')}}"><i class="fa fa-user"></i> Đăng xuất</a></div>

                                @else
                                <div>
                                    <a href="{{route('customer.login')}}"><i class="fa fa-user"></i> Đăng nhập</a>
                                </div>
                                <div>
                                    <a href="{{route('customer.register')}}"><i class="fa fa-user"></i> Đăng ký</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('home.index')}}"><img src="{{url('public/site')}}/img/AT.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{route('home.index')}}">Trang chủ</a></li>
                            <li><a href="{{route('home.shop')}}">Cửa Hàng</a></li>
                            <li><a href="{{route('home.blog')}}">Blog</a></li>
                            <li><a href="{{route('home.contact')}}">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span></span></a></li>
                            <li><a href="{{route('cart.view')}}"><i class="fa fa-shopping-bag"></i> <span>{{$cart->totalQuantity}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">Tổng tiền: <span>{{number_format($cart->totalPrice)}}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('main')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{route('home.index')}}"><img src="{{url('public/site')}}/img/AT.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa Chỉ: Hà Nội - Việt Nam</li>
                            <li>Số Điện Thoại: 0999999999</li>
                            <li>Email: anhtung@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Liên Hệ</h6>
                        <ul>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Về cửa hàng của chúng tôi</a></li>
                            <li><a href="#">Thông tin giao hàng</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <p>Nhận thông tin cập nhật qua E-mail về cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt.</p>
                        <form action="#">
                            <input type="text" placeholder="Nhập email">
                            <button type="submit" class="site-btn">Gửi đi</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">AnhTung</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="{{url('public/site')}}/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{url('public/site')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{url('public/site')}}/js/bootstrap.min.js"></script>
    <script src="{{url('public/site')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{url('public/site')}}/js/jquery-ui.min.js"></script>
    <script src="{{url('public/site')}}/js/jquery.slicknav.js"></script>
    <script src="{{url('public/site')}}/js/mixitup.min.js"></script>
    <script src="{{url('public/site')}}/js/owl.carousel.min.js"></script>
    <script src="{{url('public/site')}}/js/main.js"></script>


    @yield('js')

</body>

</html>
