<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Role;
use App\Models\Shop;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    private const FOLDER_UPLOAD_USER_THUMBNAIL = 'users/thumbnails';
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $users = DB::table('users')
        ->leftJoin('shops', 'users.id', '=', 'shops.user_id')
        ->where('users.role','=','0')
        ->select('users.name as user_name', 'shops.id as shop_id','users.email as user_email','users.gender as user_gender','users.avatar as user_avatar','users.id as user_id')->paginate(5);
        $data['users'] = $users;
        return view('admin.auth.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.auth.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $thumbnailPath = null;
        if (
            $request->hasFile('avatar')
            && $request->file('avatar')->isValid()
        ) {
            // Nếu có thì thục hiện lưu trữ file vào public/products/thumbnail
            $image = $request->file('avatar');
            $extension = $request->avatar->extension();
            $extension = strtolower($extension); // convert string to lowercase
            $fileName = 'avatar_' . time() . '.' . $extension;

            // upload file to server
            $image->move(self::FOLDER_UPLOAD_USER_THUMBNAIL, $fileName);

            // set filename
            $thumbnailPath = self::FOLDER_UPLOAD_USER_THUMBNAIL . '/' . $fileName;
        }
        $userInsert=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make('$request->password'),
            'role'=>0,
            'gender'=>$request->gender,
            'avatar'=> $thumbnailPath
        ];
      
    
        DB::beginTransaction();
        try{
            $user = User::create($userInsert);
            DB::commit();
            return redirect()->route('admin.user.index')->with('sucess', 'Insert into data to User Sucessful.');
        }catch(\Exception $ex){
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
        $user = DB::table('users')
        ->leftJoin('shops', 'users.id', '=', 'shops.user_id')
        ->where('users.id',$id)->select('users.name as user_name','shops.name as shop_name','shops.image as shop_image','shops.id as shop_id','shops.address as shop_address','users.role as user_role','users.email as user_email','users.password as user_password')->get();
        $data['user'] = $user;
        return view('admin.auth.users.detail', $data);
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
        $user = Admin::findOrFail($id);
        $roles = Role::where('id','>','1')->get();
        $data['roles']=$roles;
        
        return view('admin.auth.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = Admin::find($id);
            $user->password = $request->password;
            $user->role_id = $request->role_id;
            $user->status = $request->status;
            $user->save();
            DB::commit();
            return redirect()->route('admin.user.index')->with('success', 'Insert User seccessful');
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
        DB::beginTransaction();

        try {
            $user = Admin::find($id);
            $user->delete();

            DB::commit();

            return redirect()->route('admin.user.index')
                ->with('success', 'Delete User successful!');
        } catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
