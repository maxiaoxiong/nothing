<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RoleRepository;
use PermissionRepository;

class RoleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = RoleRepository::getAll();
        $permissions = PermissionRepository::getAll();
        return view('backend.roles.index', compact('roles', 'permissions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.roles.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (RoleRepository::save($request->except('_token'))) {
            notify()->flash('创建角色成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.setting.role.index');
        }
        notify()->flash('创建角色失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        $request->flash();
        return redirect()->back();
    }

    public function associatePermission(Request $request)
    {
        $id = $request->get('id');
        $permission = $request->get('permission_id');

        $role = RoleRepository::findById($id);

        if ($role->perms()->sync($permission)) {
            notify()->flash('角色赋权成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return back();
        }

        notify()->flash('角色赋权失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return back();
    }

    public function getRoleHasPermission($id)
    {
        return response()->json(['arr' => RoleRepository::getRoleHasPermission($id)]);
    }
}