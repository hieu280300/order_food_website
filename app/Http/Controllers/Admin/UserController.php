<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('check_role_admin');
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $users=Admin::where('role_id','>','1')->with('role')->paginate(5);
        $data['users']=$users;
        return view('admin.auth.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[];
        $users=Admin::where('role_id','>','1')->get();
        $roles = Role::where('id','>','1')->get();
        $data['roles']=$roles;
        $data['users']=$users;
        return view('admin.auth.users.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
     
        $userInsert=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make('$request->password'),
            'role_id'=>$request->role_id,
            'status'=>1,
        ];
        DB::beginTransaction();
        try{
            Admin::create($userInsert);
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
        return view('admin.auth.users.detail', ['user' => Admin::findOrFail($id)]);
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
        $data['user'] = $user;
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
