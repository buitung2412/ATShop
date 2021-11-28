<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id, Cart $cart)
    {
        $product = Product :: find($id);

        $cart ->add($product);

        return redirect() -> route('cart.view');
    }

    public function cart_view(Cart $cart)
    {
        return view('cart',compact('cart'));
    }

    public function remove($id, Cart $cart)
    {
       $cart -> remove ($id);

       return redirect() -> route('cart.view');
    }

    public function update($id, Cart $cart)
    {
        $quantity = (int)request('quantity') > 0 ? (int)request('quantity'):1;

        $cart -> update($id,$quantity);

        return redirect() -> route('cart.view');
    }

    public function clear( Cart $cart)
    {
        $cart -> clear();
        return redirect() -> route('cart.view');
    }

    public function checkout( Cart $cart)
    {
        return view('checkout',compact('cart'));
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
