<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CartPostRequest;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function addToCart($id)
    // {
    //     $data = [];
    //     $product = Product::find($id);
    //     if($product != null){
    //         $oldCart = Session('Cart') ? Session('Cart') :null;
    //         $newCart = new Cart($oldCart);
    //         $newCart->AddCart($product,$id);
    //         dd($newCart);
    //     }
    // }
    public function addToCart(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;
        $shop_id = $request->shop_id;
        $note = $request->note;
        // dd($note);
        $array = [];
        $array['shop_id'] = $shop_id;
        $array['id'] = $id;
        $array['qty'] = $qty;
        $array['note'] = $note;
        // dd($array);
        if (session()->has('cart')) {
            $getSession = session()->get('cart');
            $flag = 1;
            foreach ($getSession as $key => $value) {
                if ($id == $value['id']) {
                    $getSession[$key]['qty']=$getSession[$key]['qty']+$qty;
                    $getSession[$key]['note']=$note;
                    session()->put('cart', $getSession);
                    $flag = 0;
                }
            }
            if ($flag == 1) {
                session()->push('cart', $array);
            }
        } else {
            session()->push('cart', $array);
        }
        $getSession = session()->get('cart');
        $sum_cart=count($getSession);
        return response()->json(['success' => 'Đặt hàng thành công !!!',
                                'sum_cart' => $sum_cart
                                ]);
    }
    public function detail_addToCart(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;
        $array = [];
        $array['id'] = $id;
        $array['qty'] = $qty;
        if (session()->has('cart')) {
            $getSession = session()->get('cart');
            $flag = 1;
            foreach ($getSession as $key => $value) {
                if ($id == $value['id']) {
                    $getSession[$key]['qty']=$getSession[$key]['qty']+$qty;
                    session()->put('cart', $getSession);
                    $flag = 0;
                }
            }
            if ($flag == 1) {
                session()->push('cart', $array);
            }
        } else {
            session()->push('cart', $array);
        }
        $getSession = session()->get('cart');
        $sum_cart=count($getSession);
        return response()->json(['success' => 'Đặt hàng thành công !!!',
                                'sum_cart' => $sum_cart
                                ]);
    }

    public function index()
    {
        $total = 0;
        // session()->forget('cart');
        if (session()->has('cart')) {
            $getSession = session()->get('cart');
            $shop_ids=[];
            foreach ($getSession as $key => $value) {
                $product[$key] = Product::find($value['id'])->toArray();
                $product[$key]['qty'] = $value['qty'];
                $product[$key]['note'] = $value['note'];
                $total += $product[$key]['qty'] * $product[$key]['money'];
                if(!in_array($product[$key]['shop_id'],$shop_ids)){
                    $shop_ids[]=$product[$key]['shop_id'];
                }
            }
            foreach ($shop_ids as $shop_id){
                $shops[]= Shop::find($shop_id)->toArray();
            }
            // dd($shops);
            return view('frontend/carts/cart', compact('shops','product', 'total'));
        } else {
            return view('frontend/carts/cart');
        }
    }
    public function plusProduct(Request $request)
    {
        $id = $request->id;
        if (session()->has('cart')) {
            $getSession = session()->get('cart');
            // dd($getSession);

            foreach ($getSession as $key => $value) {
                if ($id == $value['id']) {
                    $getSession[$key]['qty']++;
                    session()->put('cart', $getSession);
                }
            }
        }
        // $getSession = session()->get('cart');
        // dd($getSession);
        return back();
    }
    public function minusProduct(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;

        if (session()->has('cart')) {
            $getSession = session()->get('cart');

            foreach ($getSession as $key => $value) {
                if ($id == $value['id']) {
                    $getSession[$key]['qty']--;
                    if ($getSession[$key]['qty'] == 0) {
                        unset($getSession[$key]);
                    }
                    session()->put('cart', $getSession);
                }
            }
        }
        $getSession = session()->get('cart');
        if (empty($getSession)) {
            session()->forget('cart');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartPostRequest $request)
    {

        // if (session()->has('cart')) {
        //     $getSession = session()->get('cart');
        //     // dd($getSession);
        //     foreach ($getSession as $key => $value) {
        //         $product[$key] = Product::find($value['id'])->toArray();
        //         $product[$key]['qty'] = $value['qty'];
        //         $total += $product[$key]['qty'] * $product[$key]['money'];
        //     }
        //     // dd($product);
        //     return view('frontend/carts/cart', compact('product', 'total'));
        // } else {
        //     return view('frontend/carts/cart');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $note = $request->note;
        // dd($note);
        if (session()->has('cart')) {
            $getSession = session()->get('cart');

            foreach ($getSession as $key => $value) {
                if ($id == $value['id']) {
                    $getSession[$key]['note']=$note;
                    session()->put('cart', $getSession);
                }
            }
        }

        return redirect()->action([CartController::class,'index']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct(Request $request)
    {
        $id = $request->id;
        if (session()->has('cart')) {
            $getCart = session()->pull('cart');
            // dd($getCart);

            foreach ($getCart as $key => $value) {
                if ($id == $value['id']) {
                    // dd($getCart[$key]);
                    unset($getCart[$key]);
                    // unset( $product[$key]);
                }
            }
            session()->forget('cart');
            session()->put('cart', $getCart);
        }

        $getSession = session()->get('cart');
        // dd($getSession);
        if (empty($getSession)) {
            session()->forget('cart');
        }
    }
}
