<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\Matcher\Type;
use Illuminate\Support\Facades\File;
use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Log;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getShop()
    {
        $data = [];
        $time = Carbon::now('+07:00')->toArray();
        $shops = Shop::all()->toArray();
        $data['shops'] = $shops;
        $data['time']= $time['hour'];
        return view('frontend.home.shop', $data);

    }

    public function postSearchShop(Request $request)
    {
        $shops = Shop::where('name', 'like', '%' . $request->name_shop . '%')
            ->get()
            ->toArray();
        $data = [];
        $time = Carbon::now('+07:00')->toArray();

        $data['shops'] = $shops;
        $data['time']= $time['hour'];
        return view('frontend.home.shop', $data);
    }
    public function getLogin()
    {
        return view('frontend.home.login');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember = false;
        if ($request->remeber_me)
            $remember = true;
        if (Auth::attempt($login,$remember)) {
            return redirect('/')->with('login_success', __('You are successfully logged in.'));
        } else {
            return redirect('member-login')->withErrors('Your email or password are wrong.');
        }
    }
    public function getRegister(Request $remember)
    {
        return view('frontend.home.register');
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '0',
            'avatar' =>'frontend/assets/images/features-first-icon.png'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/')->with('success', __('Congratulations, your account has been successfully created.'));
    }
    public function Logout(Type $var = null)
    {

        $getSession = session()->get('cart');
        if (!empty($getSession)) {
            session()->forget('cart');
        }
        Auth::logout();
        return redirect('member-login');
    }
    public function infoUser()
    {
        $data = [];
        $id = Auth::user()->id;
        $infoUsers = User::with('shops')->where('id', $id)->get();
        $data['infoUsers'] = $infoUsers;
        foreach ($infoUsers as $info)
        {
        if($info->role == 1)
        {
            return view('frontend.shop.home_shop',$data);
        }
        else
        {
        return view('frontend.profile.profile', $data);
        }
    //     $data = [];
    //     $id = Auth::user()->id;
    //     $shop = User::with('shops')->where('id', $id)->get();
    //     foreach ($shop as $hi)
    //     {
    //     $id_shop = $hi->shops->id;
    //     dd($id_shop);
    //     }
    //    $order= Order::with('orderDetails')->with('user')->with('shop')->where('orders.shop_id',$id_shop)->count();
    //    $orders= Order::with('orderDetails')->with('user')->with('shop')->where('orders.shop_id',$id_shop)->get();
    //    $data['orders'] = $orders;
    //    $data['hi'] = $order;
    //     $data['infoUsers'] = $infoUsers;
    //     foreach ($infoUsers as $info)
    //     {
    //     if($info->role == 1)
    //     {
    //          return view('frontend.shop.dashboard',$data);
    //     }
    //     else
    //     {
    //     return view('frontend.profile.profile', $data);
    //     }
    }
}
    public function editProfile($id)
    {
       $data = [];
       $user = User::find($id);

      $data['user'] = $user;
      return view('frontend.profile.edit_profile',$data);
    }
    public function updateProfile(UpdateProfileRequest $request,$id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        if($request->hasFile('avatar'))
        {
            $destination = 'users/thumbnails/' . $user->avatar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filename=$file ->move('users/thumbnails/',$filename);
            $user->avatar = $filename;

        }
        DB::beginTransaction();
        try {
            // update data for table posts
            $user->update();

            // create or update data for table post_details

            DB::commit();
            // SAVE OK then delete OLD file

            // success
            return redirect()->route('info-user',$user->id)->with('hihi', 'Update successful!');
        } catch (\Exception $ex) {
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
    public function manage_order()
    {
        $data=[];
        $id = Auth::user()->id;
        $manage_orders=Order::where('user_id',$id)->with('orderDetails')->with('user')->with('shop')->get();
        $data['manage_orders']=$manage_orders;
        return view('frontend.profile.manager_order',$data);
    }
    public function order_detail($id)
    {
        $order_details = DB::table('order_details')
        ->join('products', 'order_details.product_id', '=', 'products.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->where('order_id',$id)->select('products.thumbnail','products.name as product_name','order_details.quantity as quantity','order_details.money','orders.created_at as date_order')
        ->get();
        $data['order_id']=$id;
        $data['order_details']=$order_details;
        return view('frontend.profile.order_detail',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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
    public function destroy($id)
    {
        //
    }
}
