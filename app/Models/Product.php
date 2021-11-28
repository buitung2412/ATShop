<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable =
    [
        'name',
        'image',
        'price',
        'sale_price',
        'description',
        'image_list',
        'status',
        'category_id'
    ];

    //JOIN 1-1
    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    //JOIN 1-N
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }

    // thêm loacalscope
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }

        return $query;
    }
}
