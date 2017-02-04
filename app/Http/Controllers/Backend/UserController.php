<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use UserRepository;

class UserController extends Controller
{

    public function index()
    {
        $users = UserRepository::getAll();
        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('backend.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if ($user = UserRepository::save($request->except([ '_token', 'role_id' ]))) {

            $user->roles()->sync($request->get('role_id'));

            notify()->flash('添加用户成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.setting.user.index');
        }

        notify()->flash('角色赋权失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return back();
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = UserRepository::findById($id);
        return view('backend.users.edit', compact('user', 'roles'));
    }

    public function update($id, Request $request)
    {
        if ($user = UserRepository::updateById($id, $request->except([ '_token', 'role_id' ]))) {

            $user->roles()->sync(is_null($request->get('role_id')) ? [ ] : $request->get('role_id'));

            notify()->flash('编辑用户成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.setting.user.index');
        }

        notify()->flash('编辑用户失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return back();
    }
}