<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data=[];
        $users= User::where('role',0)->count();
        $shops= User::where('role',1)->count();
        $top_shop= Shop::Orderby('created_at','DESC')->limit(2)->get();
        $data['users']=$users;
        $data['shops']=$shops;
        $data['top_shop']=$top_shop;
        return view('admin.auth.dashboard',$data);
    }
}
