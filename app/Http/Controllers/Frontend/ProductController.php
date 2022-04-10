<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
// use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Route;


class ProductController extends Controller
{

    public function getProductsShop(request $request)
    {
        $shop_id = $request->id;
        $data = [];
        $products = Product::where('shop_id', $shop_id)
            ->with('category')
            ->get();
        // ->toArray();;
        $categories = Category::where('shop_id', $shop_id)
            ->pluck('name', 'id')
            ->toArray();
        // $categories = Category::pluck('name','id')->toArray();
        $data['products'] = $products;
        $data['categories'] = $categories;

        return view('frontend.home.product', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getShopDetail($id)
    {
        $data = [];
        $product = Product::find($id);
        // $products =Product::get();
        // $product_relateds=Product::where('category_id',$product->category_id )->get();
        $data['product'] = $product;
        // $data['products']=$products;
        // $data['product_relateds']=$product_relateds;
        return view('frontend.home.product_detail', $data);
    }
}
