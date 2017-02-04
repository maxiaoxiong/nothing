<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ArticleRepository;


class ArticleController extends Controller
{
    public function show($id)
    {
        $article = ArticleRepository::findById($id);
        return view(
            'pages.single', compact('article')
        );
    }
}
