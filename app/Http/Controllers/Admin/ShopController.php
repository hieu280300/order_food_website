<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ShopController extends Controller
{
    public function index()
    {
        $data = [];
        $shops = DB::table('users')
        ->leftJoin('shops', 'users.id', '=', 'shops.user_id')
        ->where('users.role','=','1')
        ->select('users.name as user_name','shops.name as shop_name','shops.image as shop_image','shops.id as shop_id','shops.address as shop_address','users.role as user_role','users.email as user_email')->get();
    
        $data['shops'] = $shops;
        return view('admin.auth.shops.index', $data);
    }
}
