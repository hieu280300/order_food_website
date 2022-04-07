<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
use Symfony\Component\Routing\Route;

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
        $route=\Request::route()->getName();
        // dd($route);
        return view('frontend.home.shop', $data);


    }
    public function postSearchShop(Request $request)
    {
        $shops = Shop::where('name', 'like', '%' . $request->name_shop . '%')
            ->get()
            ->toArray();
        $data = [];
        $time = Carbon::now()->toArray();

        $data['shops'] = $shops;
        $data['time'] = $time;
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
        // dd($login);
        $remember = false;
        if ($request->remeber_me)
            $remember = true;
        if (Auth::attempt($login, $remember)) {
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
            'role_id' => '1'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/')->with('success', __('Congratulations, your account has been successfully created.'));
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
    public function infoUser()
    {
        $data = [];
        $id = Auth::user()->id;
        $infoUsers = User::where('id', $id)->get();
        $data['infoUsers'] = $infoUsers;
        return view('frontend.profile.profile', $data);
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
