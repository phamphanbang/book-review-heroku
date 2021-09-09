<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Library\Services\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\RegistrationRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["roles"] = Role::paginate(5);
        return view('admin.role.list')->with('data',$data);
    }

    public function edit($id)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $super_admin = Role::findByName('Super Admin');
        $current_role = Role::find($id);
        // dd($current_role->permissions->contains('name','crud user'));
        return view('admin.role.edit',compact('current_role','roles','super_admin','permissions'));
    }

    public function create()
    {
        //
        $permissions = Permission::all();
        return view('admin.role.add',compact('permissions'));
    }

    public function store(Request $request)
    {
        $current_role = Role::create(['name' => $request->name]);
        if ($request->input('permissions')) {
            foreach ($request->input('permissions') as $permissionId) {
                $permission = Permission::findById($permissionId);
                $current_role->givePermissionTo($permission);
            }
        }
        $roles = Role::all();
        $permissions = Permission::all();
        $super_admin = Role::findByName('Super Admin');
        return redirect()->route('role.edit',['role' => $current_role->id])
        ->with('current_role',$current_role)
        ->with('roles',$roles)
        ->with('permissions',$permissions)
        ->with('super_admin',$super_admin)
        ->with('roleCreateSuccess',__('message.roleCreateSuccess'));
    }

    public function update(Request $request, $roleId) {
        $role = Role::findById($roleId);
        $permissions = Permission::all();
        $role->revokePermissionTo($permissions);
        if ($request->input('permissions')) {
            foreach ($request->input('permissions') as $permissionId) {
                $permission = Permission::findById($permissionId);
                $role->givePermissionTo($permission);
            }
        }
        $roles = Role::all();
        $super_admin = Role::findByName('Super Admin');
        $current_role = Role::find($roleId);
        return redirect()->route('role.edit',['role' => $current_role->id])
        ->with('current_role',$current_role)
        ->with('roles',$roles)
        ->with('permissions',$permissions)
        ->with('super_admin',$super_admin)
        ->with('roleUpdateSuccess',__('message.roleUpdateSuccess'));
    }


    public function destroy($id)
    {
        $role = Role::findById($id);
        $role->delete();
        $data["roles"] = Role::paginate(5);
        return redirect('admin/role')->with('data',$data);
    }
}
