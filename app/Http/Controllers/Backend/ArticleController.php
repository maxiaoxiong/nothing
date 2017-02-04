<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ArticleRepository;
use CategoryRepository;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = ArticleRepository::getAll();
        return view('backend.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = CategoryRepository::getAll()->pluck('name', 'id');
        return view('backend.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (ArticleRepository::save($request->except([ '_token', 'category_id' ]), $request->get('category_id'))) {
            notify()->flash('创建文章成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.site.article.index');
        }
        notify()->flash('创建文章失败', 'error', [
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了'
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $article = ArticleRepository::findById($id);
        $categories = CategoryRepository::getAll()->pluck('name', 'id');
        return view('backend.articles.edit', compact([ 'article', 'categories' ]));
    }

    public function show($id)
    {
        $article = ArticleRepository::findById($id);
        return view('backend.articles.view', compact('article'));
    }

    public function update($id, Request $request)
    {
        if (ArticleRepository::updateById($id, $request->except([ '_token', 'category_id', 'article_img' ]), $request->get('category_id'))) {
            notify()->flash('编辑文章成功!', 'success', [
                'timer' => 3000,
                'title' => '成功！',
            ]);
            return redirect()->route('admin.site.article.index');
        }

        notify()->flash('编辑文章失败', 'error', [
            'timer' => 3000,
            'title' => '失败',
            'confirmButtonText' => '我擦，知道了',
        ]);
        return redirect()->back();
    }
}