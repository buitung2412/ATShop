<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = ['name','status','prioty'];

    //JOIN 1-N
    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }

    // thêm loacalscope
    public function scopeSearch($query)
    {
        if($key = request()->key)
        {
            $query = $query -> where('name','like','%'.$key.'%');
        }

        return $query;
    }

    // globalScope

}
