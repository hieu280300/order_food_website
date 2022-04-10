<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use File;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Routing\UrlGenerator;
class ProductController extends Controller
{
    private const FOLDER_UPLOAD_PRODUCT_THUMBNAIL = 'product/thumbnails';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $data = [];
        // get list data of table posts
        $products = Product::with('category');
        // add new  param to search
        // search post name
        if (!empty($request->name)) {
            $products = $products->where('name', 'like', '%' . $request->name . '%');
        }

        // search category_id
        if (!empty($request->category_id)) {
            $products = $products->where('category_id', $request->category_id);
        }
        // pagination
        $products = $products->paginate(5);

        // get list data of table categories
        $categories = Category::pluck('name', 'id')
            ->toArray();
        // $sizes = Size::pluck('size', 'id');
        // $colors = Color::pluck('color', 'id');
        // $productDetails = ProductDetail::pluck('content')->toArray();
        // $data['colors'] = $colors;
        // $data['sizes'] = $sizes;
        // $data['productdetails'] = $productDetails;
        $data['categories'] = $categories;
        $data['products'] = $products;
        return view('admin.auth.products.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //  $currentURL = url()->previous();;
        // dd($currentURL);
        $dataInsert = [];
         $products = DB::table('shops')
        ->join('categories','categories.shop_id','=','shops.id')
        ->where('shops.id',$id)->select('categories.name as category_name','categories.id as category_id','shops.id as shop_id','shops.name as shop_name')->paginate(5);
        $dataInsert['products'] = $products;
        return view('admin.auth.products.create', $dataInsert);
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
            return redirect()->route('admin.product.show',$product->shop_id)->with('mess', 'Insert successful!');
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
        $data['shop_id']=$id;
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
        return view('admin.auth.products.edit', $data);
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
        $thumbnailOld = $product->thumbnail;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->code = $request->code;
        $product->content = $request->content;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->money = $request->money;
        $thumbnailPath = $product->thumbnail;
        if (
            $request->hasFile('thumbnail')
            && $request->file('thumbnail')->isValid()
        )
        {
            // Nếu có thì thục hiện lưu trữ file vào public/thumbnail
            $image = $request->file('thumbnail');
            $extension = $request->thumbnail->extension();
            $fileName = 'thumbnail_' . time() . '.' . $extension;
            $thumbnailPath = $image->move('product/thumbnails'. '/' . $fileName);
            $product->thumbnail = $thumbnailPath;
            Log::info('thumbnailPath: ' . $thumbnailPath);
        }
        DB::beginTransaction();

        try {
            // update data for table posts
            $product->save();
          
            // create or update data for table post_details
         
            DB::commit();
            // SAVE OK then delete OLD file
            if (File::exists(public_path($thumbnailOld))) {
                File::delete(public_path($thumbnailOld));
            }

            // success
            return redirect()->route('admin.product.show',$product->shop_id)->with('mess', 'Update successful!');
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
}
