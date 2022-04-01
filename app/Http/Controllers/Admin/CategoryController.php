<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest ;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('check_role_editor');
    // }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Method: GET
        $data = [];
        $categories = Category::get();
        $categories = Category::paginate(10);
        
        $data['categories'] = $categories;
//  dd($categories);
        return view('admin.auth.categories.index', $data);
        // return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('admin.auth.categories.create', $data);
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
            'slug' => $request->category_slug
        ];

        DB::beginTransaction();

        try {
            Category::create($categoryInsert);

            // insert into data to table category (successful)
            DB::commit();

            return redirect()->route('admin.category.index')->with('sucess', 'Insert into data to Category Sucessful.');
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
        ->join('categories','shops.id','=','categories.shop_id')
        ->where('shops.id',$id)->select('categories.name as category_name','categories.slug as category_slug')->get();
    
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
        $category = Category::findOrFail($id);
        $data['category'] = $category;
        return view('admin.auth.categories.index', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {

        //create
        DB::beginTransaction();
        try {
            $category = Category::find($id);
            $category->name = $request->category_name;
            $category->slug = $request->category_slug;
            
            $category->save();
            DB::commit();
            return redirect()->route('admin.category.index')->with('success', 'Insert Category seccessful');
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
