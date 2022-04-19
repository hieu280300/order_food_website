<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Method: GET
        $data = [];
        $id = Auth::user()->id;
        $shop = User::with('shops')->where('id', $id)->get();
        foreach ($shop as $hi)
        {
        $id_shop = $hi->shops->id;
        }
        $categories = DB::table('shops')
        ->join('categories', 'shops.id', '=', 'categories.shop_id')
        ->where('shops.id', $id_shop)->select('categories.name as category_name', 'categories.slug as category_slug', 'categories.id as category_id')->get();
        $data['categories'] = $categories;
        return view('frontend.shop.categories.index', $data);
        // return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        $shop = Shop::where('user_id', $id)->get();
        $data['shop'] = $shop;
        return view('frontend.shop.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // insert to DB
  
        $categoryInsert = [
            'name' => $request->category_name,
            'slug' => $request->category_slug,
            'shop_id' => $request->shop_id
        ];
        $category = Category::create($categoryInsert);
        DB::beginTransaction();
        try {
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Create data to Category Sucessful.');
        } catch (\Exception $ex) {
            // insert into data to table category (fail)
            DB::rollBack();
            Log::error($ex->getMessage());

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $categories = DB::table('shops')
            ->join('categories', 'shops.id', '=', 'categories.shop_id')
            ->where('shops.id', $id)->select('categories.name as category_name', 'categories.slug as category_slug', 'categories.id as category_id')->get();
        $data['categories'] = $categories;

        return view('admin.auth.categories.index', $data);
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
        $categories = DB::table('shops')
            ->join('categories', 'shops.id', '=', 'categories.shop_id')
            ->where('categories.id', $id)->orWhere('categories.shop_id', '=', 'shops.id')->select('categories.name as category_name', 'categories.slug as category_slug', 'categories.id as category_id', 'shops.name as shop_name')->get();
        $data['categories'] = $categories;
        return view('frontend.shop.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {

        //create
        DB::beginTransaction();
        try {
            $category = Category::find($id);
            $category->name = $request->category_name;
            $category->slug = $request->category_slug;
            $category->save();
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Update Category successful');
        } catch (\Throwable $ex) {
            DB::rollBack();
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
        // Method: DELETE
        DB::beginTransaction();

        try {
            $category = Category::find($id);
            $category->delete();

            DB::commit();

            return redirect()->route('category.index')
                ->with('success', 'Delete Category successful!');
        } catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
