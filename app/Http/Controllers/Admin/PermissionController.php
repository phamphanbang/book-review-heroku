<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function index()
    {
        $data["permissions"] = Permission::paginate(5);
        return view('admin.permission.list')->with('data', $data);
    }

    public function store(CreatePermissionRequest $request)
    {
        $permission = Permission::create(['name' => $request->name]);
        $data["permissions"] = Permission::paginate(5);
        if ($permission) {
            return redirect()->route('permission.index')
                ->with('permissionCreateSuccess', __('message.permissionCreateSuccess'))
                ->with('data', $data);
        } else {
            return redirect()->route('permission.index')
                ->with('permissionCreateFail', __('message.permissionCreateFail'))
                ->with('data', $data);
        }
    }

    public function update(UpdatePermissionRequest $request, $permissionId)
    {
        $permission = Permission::findById($permissionId);
        $permission->name = $request->name;
        $check = $permission->save();
        $data["permissions"] = Permission::paginate(5);
        if ($check) {
            return redirect()->route('permission.index')
                ->with('permissionUpdateSuccess', __('message.permissionUpdateSuccess'))
                ->with('data', $data);
        } else {
            return redirect()->route('permission.index')
                ->with('permissionUpdateFail', __('message.permissionUpdateFail'))
                ->with('data', $data);
        }
    }

    public function destroy($id)
    {
        $permission = Permission::findById($id);
        $permission->delete();
        $data["permissions"] = Permission::paginate(5);
        return redirect()->route('permission.index')
            ->with('permissionDeleteSuccess', __('message.permissionDeleteSuccess'))
            ->with('data', $data);
    }
}
