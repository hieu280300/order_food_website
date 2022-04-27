<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use FFI\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = [];
       $orders= Order::with('orderDetails')->with('user')->with('shop')->where('orders.shop_id',$id)->paginate(5);
 
        // if (!empty($request->date)) {
        //     $orders = $orders->whereDate('created_at','=',$request->date);

        // }
        $data['id'] = $id;
        $data['orders'] = $orders;
        return view('admin.auth.orders.index', $data);
    }
    public function search(Request $request,$id)
    {
        $data = [];
        if($request->input('date_first')!=null and $request->input('date_second')!=null)
        {
        $formDate = $request->input('date_first');
        $toDate = $request->input('date_second');
        $data = [];
       $orders= Order::with('orderDetails')->with('user')->with('shop')->where('orders.shop_id',$id)->where('orders.order_date','>=',$formDate)->where('orders.order_date','<=',$toDate)->paginate(5);
       if (!empty($request->date)) {
            $orders = $orders->whereDate('created_at','=',$request->date);

        }
        $data['id'] = $id;
        $data['orders'] = $orders;
        return view('admin.auth.orders.index', $data);
    }
    else
    {
       $orders= Order::with('orderDetails')->with('user')->with('shop')->where('orders.shop_id',$id)->paginate(5);
 
        // if (!empty($request->date)) {
        //     $orders = $orders->whereDate('created_at','=',$request->date);

        // }
        $data['orders'] = $orders;
        $data['id']=$id;
        return view('admin.auth.orders.index', $data);
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
    public function store(Request $request)
    {
        //
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
        return view('admin.auth.orders.detail',$data);
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
        $data['id'] = $id;
        return view('admin.auth.orders.edit', $data);
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

            return redirect()->route('admin.order.index',$order->id)->with('success', 'Update Status of Order successful.');
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
