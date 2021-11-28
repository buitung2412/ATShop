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
            </tr>
        </thead>
        <tbody>

        <?php $n=1; ?>

        @foreach ($model->details as $item)

        <?php

        $subtotal = $item->price*$item->quantity;

        ?>
            <tr>
                <td>{{$n}}</td>
                <td>
                    <img src="{{url('public/uploads')}}/{{$item->product->image}}" width="50">
                </td>
                <td>{{$item->product->name}}</td>
                <td>{{number_format($item->price)}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{number_format($subtotal) }}</td>
            </tr>

        <?php $n++; ?>

        @endforeach
        </tbody>
    </table>
</div>


@stop
