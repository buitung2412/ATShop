@extends('layouts.site')

@section('title','Giỏ hàng')

@section('main')



<div class="container">
    
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng Tiền </th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>

        <?php $n=1; ?>

        @foreach ($cart->items as $item)

        <?php

        $subtotal = $item['price']*$item['quantity'];

        ?>
            <tr>
                <td>{{$n}}</td>
                <td>
                    <img src="{{url('public/uploads')}}/{{$item['image']}}" width="50">
                </td>
                <td>{{$item['name']}}</td>
                <td>{{number_format($item['price'])}}</td>
                <td>
                    <form action="{{route('cart.update',['id' => $item['id']])}}">
                        <input type="number"  name="quantity" style="width: 40px; text-align: center;" value="{{$item['quantity']}}">
                        <button>Cập nhật</button>
                    </form>
                </td>
                <td>{{number_format($subtotal) }}</td>
                <td>

                <a onclick="return confirm('Bạn có muốn xóa sản phẩm khỏi giỏ hàng không ?')" href="{{ route('cart.remove',['id' => $item['id']]) }}" class="btn btn-xs btn-default"> &times;</a>

                </td>
            </tr>

        <?php $n++; ?>

        @endforeach
        </tbody>
    </table>
    
    <div class="jumbotron text-center">

        <h4>Tổng tiền: {{number_format($cart->totalPrice)}}</h4>
        <br>
        <p class="lead">
            <a class="btn btn-primary " href="{{route('home.index')}}" role="button">Tiếp tục mua hàng</a>
            <a onclick="return confirm('Bạn có muốn xóa hết sản phẩm khỏi giỏ hàng không ?')" class="btn btn-danger " href="{{route('cart.clear')}}" role="button">Xóa giỏ hàng</a>
            <a class="btn btn-success " href="{{route('cart.checkout')}}" role="button">Check out</a>

        </p>
    </div>
    

</div>


@stop