<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function checkout( Cart $cart)
    {
        return view('checkout',compact('cart'));
    }

    public function my_order()
    {
        $cus_id = Auth::guard('account')->user()->id;
        $orders = Order::orderBy('created_at','DESC')->where('account_id',$cus_id)->where('status','<>',3)->get();
        return view('my_order',compact('orders'));
    }

    public function order_detail($id)
    {
        $model = Order::find($id);

        return view('order_detail',compact('model'));
    }

    public function post_checkout(Request $request, Cart $cart)
    {
        // lưu vào bảng order
        if($order = Order::create([
            'name' => $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'account_id'=> $request->account_id,
        ]))
        {
            //duyệt giỏ hàng lưu vào chi tiết đơn hàng

            $order_id = $order->id;
            $check = true;
            foreach ($cart->items as $pro_id => $items)
            {
                $quantity = $items['quantity'];
                $price = $items['price'];

                if(!OrderDetail::create([
                    'order_id' => $order_id,
                    'product_id' => $pro_id,
                    'quantity'=> $quantity,
                    'price' => $price,
                ]))
                {
                    $check = false;
                    break;
                }
            }

            if ($check==false)
            {
                OrderDetail::where('order_id',$order_id)->delete();
                Order::where('id',$order_id)->delete();
                return redirect() -> route('cart.view');
            }
            else
            {
                $cart->clear();
                return redirect() -> route('cart.view');
            }
        }
    }
}
