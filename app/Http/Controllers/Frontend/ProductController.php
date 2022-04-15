<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function getProductDetail($id)
    {
        $data = [];
        $product = Product::find($id);
        $rate = Rate::where('product_id','=',$id)
                    ->get()
                    ->toArray();

        $sum = 0;
            foreach($rate as $value){
                $sum = $sum + $value['point'];
            }
        $dem = count($rate);
        if($dem==0){
            $stars=0;
        }
        else{
            $stars = round($sum/$dem,1);
        }
        $cmt = DB::table('users')
                    ->join('comments','users.id','=','comments.user_id')
                    ->where('comments.product_id','=',$id)
                    ->get();

        $data['product'] = $product;
        $data['stars'] = $stars;
        $data['dem'] = $dem;
        $data['cmt'] = $cmt;
        // dd($data);
        return view('frontend.home.product_detail', $data);
    }
    public function postRate(Request $request)
    {
        // dd("adsf");
        $checkRate = Rate::where('product_id','=',$request->id)
                        ->get()
                        ->toArray();

            $check = true;
            foreach($checkRate as $value){
                // dd($value['user_id']);
                if ($value['user_id'] == Auth::user()->id){
                    $check = false;
               }
            }

        if ($check){
            $rate = Rate::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
                'point'    => $request->stars
            ]);
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
    public function PostCmt(Request $request)
    {
        // dd($request->all());
        $cmt = Comment::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->id,
            'comment'    => $request->message,
            'level' => $request->level,
        ]);
        return redirect()->back();
    }
}
