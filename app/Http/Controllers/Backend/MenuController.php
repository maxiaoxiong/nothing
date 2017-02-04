<?php


namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use MenuRepository;

class MenuController
{

    public function index()
    {
        $menus = MenuRepository::getAll();
        return view('backend.menus.index', compact('menus'));
    }

    public function create()
    {
        $menus = MenuRepository::getAll();
        $formatMenus = create_level_tree($menus);
        return view('backend.menus.create', compact('formatMenus'));
    }

    public function store(Request $request)
    {
        if (MenuRepository::save($request->except('_token'))) {
            notify()->flash('创建菜单成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.setting.menu.index');
        }

        notify()->flash('创建菜单失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $menus = MenuRepository::getAll();
        $formatMenus = create_level_tree($menus);

        $menu = MenuRepository::findById($id);
        return view('backend.menus.edit', compact('menu', 'formatMenus'));
    }

    public function update($id, Request $request)
    {
        if (MenuRepository::updateById($id, $request->except('_token'))) {

            notify()->flash('更新菜单成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.setting.menu.index');
        }

        notify()->flash('更新菜单失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return redirect()->back();

    }

    public function destroy($id)
    {
        if (MenuRepository::delete($id)) {
            notify()->flash('删除菜单成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.setting.menu.index');
        }
        notify()->flash('删除菜单失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return redirect()->back();
    }
}