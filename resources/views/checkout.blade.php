@extends('layouts.site')

@section('title','Check Out')

@section('main')



<div class="container">

    <div class="row">



        <div class="col-md-6">

            <div class="checkout__input">
                @if(Auth::guard('account')->check())

                <form action="" method="POST">

                    @csrf
                    <input type="hidden" name="account_id" value="{{Auth::guard('account')->user()->id}}">
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="name" id="" class="form-control" placeholder="" value="{{Auth::guard('account')->user()->name}}">
                    </div>

                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="phone" id="" class="form-control" placeholder="" value="{{Auth::guard('account')->user()->phone}}">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control" placeholder="" value="{{Auth::guard('account')->user()->email}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="site-btn">Đặt Hàng</button>

                    </div>

                </form>


                @else

                <div class="alert alert-danger" role="alert">

                    <h4>Yêu cầu không được phép</h4>
                    <p>Vui lòng đăng nhập để đặt hàng</p>

                </div>

                @endif


            </div>
        </div>


        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $n = 1; ?>

                    @foreach ($cart->items as $item)

                    <?php

                    $subtotal = $item['price'] * $item['quantity'];

                    ?>
                    <tr>
                        <td>{{$n}}</td>
                        <td>
                            <img src="{{url('public/uploads')}}/{{$item['image']}}" width="50">
                        </td>
                        <td>{{$item['name']}}</td>
                        <td>{{number_format($item['price'])}}</td>
                        <td>{{$item['quantity']}}</td>
                        <td>{{number_format($subtotal) }}</td>
                    </tr>

                    <?php $n++; ?>

                    @endforeach
                </tbody>
            </table>
        </div>


    </div>


</div>


@stop
