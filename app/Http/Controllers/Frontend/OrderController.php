<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Shop;
use Carbon\Carbon;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $data = [];
        $id = Auth::user()->id;
        $shop = User::with('shops')->where('id', $id)->get();
        foreach ($shop as $hi)
        {
        $id_shop = $hi->shops->id;
        }
       $orders= Order::with('orderDetails')->with('user')->with('shop')->where('orders.shop_id',$id_shop)->paginate(5);
        if (!empty($request->date)) {
            $orders = $orders->whereDate('created_at','=',$request->date);

        }
        $data['orders'] = $orders;
        // dd($orders);

        return view('frontend.shop.orders.index', $data);
    }
    public function search(Request $request)
    {
        $formDate = $request->input('date_first');
        $toDate = $request->input('date_second');
        $data = [];
        $id = Auth::user()->id;
        $shop = User::with('shops')->where('id', $id)->get();
        foreach ($shop as $hi)
        {
        $id_shop = $hi->shops->id;
        }
       $orders= Order::with('orderDetails')->with('user')->with('shop')->where('orders.shop_id',$id_shop)->where('orders.order_date','>=',$formDate)->where('orders.order_date','<=',$toDate)->get();
       if (!empty($request->date)) {
            $orders = $orders->whereDate('created_at','=',$request->date);

        }
        $data['orders'] = $orders;
        return view('frontend.shop.orders.index', $data);
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
    public function store(Request $request)
    {
        if (session()->has('cart')) {
            $getSession = session()->get('cart');
            $shop_ids=[];
            foreach ($getSession as $key => $value) {
                $product[$key] = Product::find($value['id'])->toArray();
                $product[$key]['qty'] = $value['qty'];
                $product[$key]['note'] = $value['note'];
                // $total += $product[$key]['qty'] * $product[$key]['money'];
                if(!in_array($product[$key]['shop_id'],$shop_ids)){
                    $shop_ids[]=$product[$key]['shop_id'];
                }

            }
            foreach ($shop_ids as $shop_id){
                $dem = 0;
                $shop[$shop_id]=0;
                foreach ($getSession as $key => $value) {
                    if($product[$key]['shop_id']==$shop_id){
                        $dem = $dem + $product[$key]['qty'];
                        $shop[$shop_id] +=  $product[$key]['qty'] * $product[$key]['money'];
                    }
                }
                if($dem<5){
                    $shop[$shop_id] +=15000;
                }
            }
            foreach ($shop_ids as $shop_id){
                $order= Order::create([
                    'shop_id' => $shop_id,
                    'user_id' => Auth::user()->id,
                    'comment' => $request->note,
                    'order_date' =>Carbon::now('+07:00')->toDateTimeString(),
                    'status' => 0,
                    'name' => $request->name,
                    'phone' => $request ->sdt,
                    'address' => $request -> diachi,
                    'total' => $shop[$shop_id],
                ]);

                $orderId=$order->id;

                foreach ($getSession as $key => $value) {
                    $orderdetail= OrderDetail::create([
                        'product_id' => $value['id'],
                        'order_id' => $orderId,
                        'quantity' => $value['qty'],
                        'money' => $product[$key]['money'],
                        'note' => $product[$key]['note'],
                    ]);
                }
            }
        }
        $mail = Auth::user()->email;
        $message = [
            'type' => 'Create task',
            'name' =>  $request->name,
            'phone' => $request->sdt,
            'diachi' => $request->diachi,
            'email' => $mail,
            'content' => 'has been created!',
        ];
        SendEmail::dispatch($message, $mail )->delay(now()->addMinute(1));
        $getSession = session()->get('cart');
        if (!empty($getSession)) {
            session()->forget('cart');
        }
        return view('frontend.carts.checkout_complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order =Order::findOrFail($id)->with('orderDetails')->with('user')->get();
        $order_details = DB::table('order_details')
        ->join('products', 'order_details.product_id', '=', 'products.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->where('order_id',$id)->select('products.thumbnail','products.name as product_name','products.money as price','order_details.quantity as quantity','order_details.money as money','orders.created_at as date_order','orders.total as total')
        ->get();

        $data['order_id']=$id;
        $data['order_details']=$order_details;
        return view('frontend.shop.orders.detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $id_order =Order::findOrFail($id);
        $id =  $id_order->id;
        $orders =Order::with('orderDetails')->with('user')->where('orders.id', $id)->get();
        $data['orders'] = $orders;
        return view('frontend.shop.orders.edit', $data);
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
        $order = Order::findOrFail($id);

        DB::beginTransaction();

        try {
            $order->update([
                'status' => $request->status,
            ]);

            DB::commit();

            return redirect()->route('order.index')->with('success', 'Update Status of Order successful.');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
