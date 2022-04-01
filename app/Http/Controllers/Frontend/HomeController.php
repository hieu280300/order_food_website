<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Matcher\Type;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop(request $request)
    {
        $data=[];
        $products =  Product::with('category')->get();
        $categories =  Category::pluck('name','id')->toArray();
        $data['products'] = $products;
        $data['categories'] = $categories;
        return view('frontend.home.product',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop_detail($id)
    {
        $data=[];
        $product=Product::find($id);
        // $products =Product::get();
        // $product_relateds=Product::where('category_id',$product->category_id )->get();
        $data['product']=$product;
        // $data['products']=$products;
        // $data['product_relateds']=$product_relateds;
        return view('frontend.home.product_detail', $data);
    }
    public function getLogin(Type $var = null)
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
        // dd($login);
        $remember = false;
        if($request->remeber_me)
            $remember = true;
        if(Auth::attempt($login,$remember)){
            return redirect('/')->with('login_success',__('You are successfully logged in.'));
        }
        else {
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
            'role_id' => '1'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/')->with('success',__('Congratulations, your account has been successfully created.'));
    }
    public function Logout(Type $var = null)
    {
        Auth::logout();
        $getSession = session()->get('cart');
        if (empty($getSession)) {
            session()->forget('cart');
        }
        return redirect('member-login');

    }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
