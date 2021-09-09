<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Library\Services\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\RegistrationRequest;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userService = $userServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["users"] = User::getAllUsers();
        return view('admin.user.list')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name','!=','Super Admin')->get();
        return view('admin.user.add')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRequest $request)
    {
        $data["user"] = new User;
        $data["user"]->name = $request->name;
        $data["user"]->email = $request->email;
        $data["user"]->password = Hash::make($request->password);
        $data["user"]->save();
        $data["user"]->assignRole($request->role);
        if($request->hasFile('image')){
            $fileName = $this->userService->changeImage($request,$data["user"]->id);
            $data["user"]->image = $fileName;
            $data["user"]->save();
        }
        return redirect('admin/user/'.$data["user"]->id.'/edit')->with('data',$data)->with('registerSuccess',__('message.registerSuccess'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::where('name','!=','Super Admin')->get();
        $super_admin = Role::findByName('Super Admin');
        $data["user"] = User::find($id);
        return view('admin.user.edit',compact('data','roles','super_admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data["user"] = User::find($id);
        if($request->hasFile('image')){
            $data["user"]->image = $this->userService->changeImage($request,$id);
        }
        if($request->password){
            $data["user"]->password = Hash::make($request->password); 
        }
        $data["user"]->save();
        $data["user"]->update($request->except(['password','image']));
        return back()->with('data',$data)->with('profileChangeSuccess',__('message.profileChangeSuccess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $data["users"] = User::getAllUsers();
        return redirect('admin/user')->with('data',$data);
    }

    public function login(){
        return view('admin.layout.login');
    }

    public function search(Request $request) {
        $data["users"] = $this->userService->searchBy($request->search,$request->by);
        return view('admin.user.list')->with('data',$data);
    }
}
