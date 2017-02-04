<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CategoryRepository;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = CategoryRepository::getAll();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(Request $request)
    {
        if (CategoryRepository::save($request->except('_token'))) {
            notify()->flash('创建栏目成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.site.category.index');
        }

        notify()->flash('创建栏目失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        $request->flash();
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = CategoryRepository::findById($id);

        return view('backend.categories.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        if (CategoryRepository::updateById($id, $request->except('_token'))) {
            notify()->flash('修改栏目成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.site.category.index');
        }

        notify()->flash('修改栏目失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        $request->flash();
        return redirect()->back();
    }
}