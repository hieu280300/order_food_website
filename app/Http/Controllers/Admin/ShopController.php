<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    private const FOLDER_UPLOAD_SHOP_THUMBNAIL = 'shop_images';
    public function index()
    {
        $data = [];
        $shops = DB::table('users')
        ->leftJoin('shops', 'users.id', '=', 'shops.user_id')
        ->where('users.role','=','1')
        ->select('users.name as user_name','shops.name as shop_name','shops.image as shop_image','shops.id as shop_id','shops.address as shop_address','users.role as user_role','users.email as user_email')->paginate(5);

        $data['shops'] = $shops;
        return view('admin.auth.shops.index', $data);
    }
    public function create()
    {
        return view('admin.auth.shops.create');
    }
    public function store(StoreShopRequest $request)
    {
        $thumbnailPath = null;
        if (
            $request->hasFile('image_shop')
            && $request->file('image_shop')->isValid()
        ) {
            // Nếu có thì thục hiện lưu trữ file vào public/products/thumbnail
            $image = $request->file('image_shop');
            $extension = $request->image_shop->extension();
            $extension = strtolower($extension); // convert string to lowercase
            $fileName = 'image_shop_' . time() . '.' . $extension;

            // upload file to server
            $image->move(self::FOLDER_UPLOAD_SHOP_THUMBNAIL, $fileName);

            // set filename
            $thumbnailPath = self::FOLDER_UPLOAD_SHOP_THUMBNAIL . '/' . $fileName;
        }

        $userInsert=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>1,
        ];
        $user=User::create($userInsert);
            $shopInsert=[
                'name'=>$request->name_shop,
                'phone'=>$request->phone_shop,
                'address'=>$request->address_shop,
                'image'=>$thumbnailPath,
                'time_open'=>$request->time_open.':00',
                'time_close'=>$request->time_close.':00',
                'user_id'=>$user->id

            ];
            $shop = Shop::create($shopInsert);
           
        DB::beginTransaction();
        try{
            $categoryInsert=[
                'shop_id'=>$shop->id
            ];
            $productInsert=[
                'shop_id'=>$shop->id
            ];
            Category::create($categoryInsert);
            Product::create($productInsert);
            DB::commit();
            return redirect()->route('admin.shop.index')->with('sucess_shop', 'Đã tạo cửa hàng thành công.');
        }catch(\Exception $ex){
            DB::rollBack();
            Log::error($ex->getMessage());

            return redirect()->back()->with('error', $ex->getMessage());
        }
     }
}
