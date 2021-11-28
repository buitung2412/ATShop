@extends('layouts.site')

@section('title','Thông tin tài khoản')

@section('main')

<div class="container">
    <div class="jumbotron">

        <div class="col-md-6">

            <div class="checkout__input">
                @if(Auth::guard('account')->check())

                <h4>Thông tin khách hàng:</h4>
                <br>
                <form action="">

                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="" id="" class="form-control" placeholder="" value="{{Auth::guard('account')->user()->name}}">
                    </div>

                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="" id="" class="form-control" placeholder="" value="{{Auth::guard('account')->user()->phone}}">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="" id="" class="form-control" placeholder="" value="{{Auth::guard('account')->user()->email}}">
                    </div>

                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="" id="" class="form-control" placeholder="" value="{{Auth::guard('account')->user()->address}}">
                    </div>
                </form>

                @else

                <div>


                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>403!</strong> Bạn không thể truy cập trang này, vui lòng đăng nhập ...
                    </div>


                </div>

                @endif
            </div>
        </div>

    </div>
</div>

@stop