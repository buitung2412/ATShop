<?php 

namespace App\Helpers;

class Cart{

    public $item = [];

    public $totalQuantity = 0;
    
    public $totalPrice=0;

    public function __construct()
    {
        $this -> items = session('cart') ? session('cart') : [];
        $this -> totalQuantity = $this->getTotalQuantity();
        $this -> totalPrice = $this->getTotalPrice();
    }

    public function add($product, $quantity = 1)
    {
        if (isset($this->items[$product->id]))
        {
            $this -> items[$product->id] ['quantity'] += $quantity;
        }
        else
        {
            $item = [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->sale_price ? $product -> sale_price : $product->price,
                'quantity' => $quantity
            ];

            $this -> items[$product->id] = $item;
        }
        
        session(['cart' => $this -> items]);
        
    }

    public function remove($id)
    {
        if (isset($this->items[$id]))
        {
            unset($this->items[$id]);

            session(['cart' => $this -> items]);
        
        }
    }

    public function clear()
    {
        session(['cart'=>null]);
    }
    
    public function update($id,$quantity)
    {
        if(isset($this->items[$id]))
        {
            $this->items[$id]['quantity'] = $quantity;
            session(['cart' => $this -> items]);
        }
    }

    private function getTotalQuantity()
    {
        $total =0;
        foreach($this->items as $item)
        {
            $total += $item['quantity'];

        }

        return $total;
    }

    private function getTotalPrice()
    {
        $total =0;
        foreach($this->items as $item)
        {
            $total += $item['quantity']*$item['price'];

        }

        return $total;
    }
}
