<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Action;
use ActionRepository;
use Illuminate\Http\Request;

class ActionController extends Controller
{

    public function index()
    {
        $actions = ActionRepository::getAll();
        return view('backend.actions.index', compact('actions'));
    }

    public function create()
    {
        return view('backend.actions.create');
    }

    public function store(Request $request)
    {
        if (ActionRepository::save($request->except('_token'))) {
            notify()->flash('创建操作成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.setting.action.index');
        }

        notify()->flash('创建操作失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $action = ActionRepository::findById($id);
        return view('backend.actions.edit', compact('action'));
    }

    public function update($id, Request $request)
    {
        if (ActionRepository::updateById($id, $request->except('_token'))) {

            notify()->flash('更新操作成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.setting.action.index');
        }

        notify()->flash('更新操作失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return redirect()->back();

    }

    public function destroy($id)
    {
        if (ActionRepository::delete($id)) {
            notify()->flash('删除操作成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.setting.action.index');
        }
        notify()->flash('删除操作失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return redirect()->back();
    }

    public function associate()
    {

    }
}