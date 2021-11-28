<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function index()
    {
        $new_products = Product::orderBy('created_at', 'DESC')->limit(4)->get();
        $cats = Category::orderBy('name', 'ASC')->get();
        return view('home', compact('new_products', 'cats'));
    }
    public function shop()
    {
        $cats = Category::orderBy('name','ASC')->get();
        $sale_pro  = Product::orderBy('created_at', 'DESC')->where('sale_price', '>', 0)->limit(8)->get();
        $allpro = Product::orderBy('created_at','DESC')-> paginate(5);
        return view('shop',compact('cats','sale_pro','allpro'));
    }

    public function blog()
    {
        return view('blog');
    }

    public function contact()
    {
        return view('contact');
    }

    public function category($id, $slug)
    {
        $model = Category::find($id);
        $cats = Category::orderBy('name', 'ASC')->get();
        $sale_pro  = Product::orderBy('created_at', 'DESC')->where('sale_price', '>', 0)->limit(8)->get();
        if ($model ) {
            return view('category', compact('model', 'cats', 'sale_pro'));
        }
        return view('error.404');
    }

    public function product($id, $slug)
    {
        $model = Product::find($id);
        $cats = Category::orderBy('name', 'ASC')->get();

        if ($model ) {
            return view('product', compact('model', 'cats'));
        }
        return view('error.404');
    }

    public function search()
    {
        $key = request() ->key;
        $cats = Category::orderBy('name', 'ASC')->get();
        $products = Product::where('name','like','%'.$key.'%')->paginate(10);

        return view('search', compact('products', 'cats'));
    }
}
