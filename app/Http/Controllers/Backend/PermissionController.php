<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use PermissionRepository;

class PermissionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $permissions = PermissionRepository::getAll();
        return view('backend.permissions.index', compact('permissions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.permissions.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (PermissionRepository::save($request->all())) {
            notify()->flash('创建权限成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.setting.permission.index');
        }
        notify()->flash('创建权限失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $permission = PermissionRepository::findById($id);
        return view('backend.permissions.edit', compact('permission'));
    }

    public function update($id, Request $request)
    {
        if (PermissionRepository::updateById($id, $request->except('_token'))) {
            notify()->flash('更新权限成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.setting.permission.index');
        }
        notify()->flash('更新权限失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return redirect()->back();

    }

    public function delete($id)
    {
        if (PermissionRepository::delete($id)) {
            notify()->flash('删除权限成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.setting.permission.index');
        }
        notify()->flash('删除权限失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return redirect()->back();

    }

    public function associate($id)
    {
        $permission = PermissionRepository::findById($id);
        switch ($permission->type) {
            case 'menu':
                $data = json_encode(PermissionRepository::getAllMenusByPermission($permission));
                break;
            case 'action':
                $data = json_encode(PermissionRepository::getAllActionsByPermission($permission));
                break;

        }

        return view('backend.permissions.' . $permission->type, compact('data', 'id'));
    }

    public function associateMenus(Request $request)
    {
        $id = $request->get('id');
        $menus = $request->get('menus');

        $permission = PermissionRepository::findById($id);
        if ($permission->menus()->sync($menus ? $menus : [])) {

            return response()->json(['title' => '！成功', 'text' => '菜单赋权成功', 'type' => 'success']);
        }

        return response()->json(['title' => '！失败', 'text' => '菜单赋权失败', 'type' => 'error']);
    }

    public function associateActions(Request $request)
    {
        $id = $request->get('id');
        $actions = $request->get('actions');

        $permission = PermissionRepository::findById($id);
        if ($permission->actions()->sync($actions ? $actions : [])) {
            return response()->json(['title' => '！成功', 'text' => '操作赋权成功', 'type' => 'success']);
        }
        return response()->json(['title' => '！失败', 'text' => '操作赋权失败', 'type' => 'error']);
    }

}