<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
// use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    private const FOLDER_UPLOAD_PRODUCT_THUMBNAIL = 'product/thumbnails';

    public function getProductsShop(request $request)
    {
        $shop_id = $request->id;
        $data = [];
        $shop = Shop::where('id', $shop_id)->get()->toArray();

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
        $data['shop']=$shop;
        // dd($data);
        return view('frontend.home.product', $data);
    }
    public function getShopClose(request $request)
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

        return view('frontend.home.shopclose', $data);

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
        $products = DB::table('products')
        ->join('shops','shops.id','=','products.shop_id')
        ->join('categories','products.category_id','=','categories.id')
        ->where('shops.id',$id_shop)->select('products.id as product_id','products.name as product_name','products.slug as product_slug','products.code as product_code','products.thumbnail as product_thumbnail','products.description as product_description','products.content as product_content','products.money as product_money','products.quantity as product_quantity','products.category_id','categories.name as category_name','categories.slug as category','products.shop_id as shop_id')->paginate(5);
        $data['shop_id']=$id;
        $data['products'] = $products;
        return view('frontend.shop.products.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        $dataInsert = [];
         $products = DB::table('shops')
        ->join('categories','categories.shop_id','=','shops.id')
        ->where('shops.id',$id)->select('categories.name as category_name','categories.id as category_id','shops.id as shop_id','shops.name as shop_name')->paginate(5);
        $dataInsert['products'] = $products;
        foreach ($products as $product)
        {
            if (empty($product->category_name))
            {
                return view('frontend.shop.products.no_create');
            }
            else
            {
                return view('frontend.shop.products.create', $dataInsert);
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $thumbnailPath = null;
        if (
            $request->hasFile('thumbnail')
            && $request->file('thumbnail')->isValid()
        ) {
            // Nếu có thì thục hiện lưu trữ file vào public/products/thumbnail
            $image = $request->file('thumbnail');
            $extension = $request->thumbnail->extension();
            $extension = strtolower($extension); // convert string to lowercase
            $fileName = 'thumbnail_' . time() . '.' . $extension;

            // upload file to server
            $image->move(self::FOLDER_UPLOAD_PRODUCT_THUMBNAIL, $fileName);

            // set filename
            $thumbnailPath = self::FOLDER_UPLOAD_PRODUCT_THUMBNAIL . '/' . $fileName;
        }
        $dataInsert = [
            'name' => $request->name,
            'code' => $request->code,
            'slug' => $request->slug,
            'description' => $request->description,
            'content' =>$request->content,
            'quantity' => $request->quantity,
            'money' => $request->money,
            'thumbnail' => $thumbnailPath,
            'is_feature' => 0,
            'category_id' => $request->category_id,
            'shop_id'=>$request->shop_id,
        ];
        $product = Product::create($dataInsert);
        DB::beginTransaction();
        try {
            DB::commit();
            // success
            return redirect()->route('product.index',$product->shop_id)->with('mess', 'Insert successful!');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollback();
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,request $request)
    {

        $data = [];
        $products = DB::table('products')
        ->join('shops','shops.id','=','products.shop_id')
        ->join('categories','products.category_id','=','categories.id')
        ->where('shops.id',$id)->select('products.id as product_id','products.name as product_name','products.slug as product_slug','products.code as product_code','products.thumbnail as product_thumbnail','products.description as product_description','products.content as product_content','products.money as product_money','products.quantity as product_quantity','products.category_id','categories.name as category_name','categories.slug as category','products.shop_id as shop_id')->paginate(5);
        // $products = Product::with('category');
        //  $categories = Category::pluck('name', 'id')
        //  ->toArray();
        // $data['categories'] = $categories;
        $data['shop_id'] = $id;
        $data['products'] = $products;

        return view('admin.auth.products.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $data = [];
    //     $post = Post::findOrFail($id);
    //     $categories = Category::pluck('name', 'id')->toArray();
    //     $data['posts'] = $post;
    //     $data['categories'] = $categories;
    //     return view('posts.edit', $data);
    // }
    public function edit($id)
    {
        $data = [];
        $products= DB::table('products')
        ->join('shops','shops.id','=','products.shop_id')
        ->join('categories','products.category_id','=','categories.id')
        ->where('products.id',$id)->orWhere('products.shop_id','=','shops.id')->select('products.id as product_id','products.name as product_name','products.slug as product_slug','products.code as product_code','products.thumbnail as product_thumbnail','products.description as product_description','products.content as product_content','products.money as product_money','products.quantity as product_quantity','products.category_id','categories.name as category_name','categories.id as category_id','products.shop_id as shop_id','shops.name as shop_name','products.thumbnail as thumbnail')->get();
        $data['shop_id']=$id;
        $data['products'] = $products;
        return view('frontend.shop.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {

        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->code = $request->code;
        $product->content = $request->content;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->money = $request->money;
        if($request->hasFile('thumbnail'))
        {
            $destination = 'product/updates/' . $product->thumbnail;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filename=$file ->move('product/updates/',$filename);
            $product->thumbnail = $filename;
        }
        DB::beginTransaction();

        try {
            // update data for table posts
            $product->update();

            // create or update data for table post_details

            DB::commit();
            return redirect()->route('product.index')->with('mess', 'Update successful!');
        } catch (\Exception $ex) {
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
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
        DB::beginTransaction();
        try {
            $product = Product::find($id);
            $product->delete();
            DB::commit();
            return redirect()->route('admin.product.index')
                ->with('success', 'Delete Product successful!');
        } catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
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
