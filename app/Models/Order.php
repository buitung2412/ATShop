<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'account_id',

    ];

    //JOIN 1-N
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function total_amount()
    {
        $total =0;
        foreach ($this ->details as $key => $detail)
        {
            $total += $detail->price * $detail-> quantity;
        }

        return $total;
    }

    public function cus()
    {
        return $this->hasOne(Account::class,'id','account_id');
    }
}
