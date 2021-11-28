@extends('layouts.site')

@section('title','Giỏ hàng')

@section('main')



<div class="container">
    
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ngày đặt hàng</th>
                <th>Trạng thái</th>
                <th>Tổng Tiền </th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>

        <?php $n=1; ?>

        @foreach ($orders as $item)

        <?php

        $total = $item->total_amount();

        ?>
            <tr>
                <td>{{$n}}</td>
                <td>{{$item->created_at->format('d-m-Y')}}</td>
                <td>
                    @if($item->status == 0)

                    <span class="btn btn-sm btn-danger">Chờ duyệt</span>

                    @elseif($item->status == 1)

                    <span class="btn btn-sm btn-primary">Đã duyệt</span>

                    @elseif($item->status == 2)

                    <span class="btn btn-sm btn-success">Đã giao hàng</span>

                    @else

                    <span class="btn btn-sm btn-warning">Đã hủy</span>

                    @endif
                </td>
                <td>{{number_format($total)}}</td>
                <td>

                <a onclick="" href="{{ route('order.detail',['id' => $item->id]) }}" class="btn btn-xs btn-default"> View</a>

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
