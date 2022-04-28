<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateProfileShopRequest;
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
            'password'=>Hash::make($request->password),
            'role'=>0,
            'gender'=>$request->gender,
            'avatar'=> $thumbnailPath,
        ];

        $user = User::create($userInsert);
        DB::beginTransaction();
        try{
          
            DB::commit();
            return redirect()->route('admin.user.index')->with('sucess_create_user', 'Đã thêm thành công.');
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
        $user = User::findOrFail($id);
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
        $user = User::findOrFail($id);
        $data['user']=$user;
        return view('admin.auth.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request,$id)
    {
     
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        if($request->hasFile('avatar'))
        {
            $destination = 'users/thumbnails/' . $user->avatar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filename=$file ->move('users/thumbnails/',$filename);
            $user->avatar = $filename;

        }
        DB::beginTransaction();
        try {
            // update data for table posts
            $user->update();

            // create or update data for table post_details

            DB::commit();
            // SAVE OK then delete OLD file

            // success
            return redirect()->route('admin.user.index')->with('sucess_create_user', 'Đã cập nhật thành công');
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
            $user = User::find($id);
            $user->delete();

            DB::commit();

            return redirect()->route('admin.user.index')
                ->with('success_delete_user', 'Đã xóa thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
