<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use ArticleRepository;

class PageController extends Controller
{
    public function blog()
    {
        $articles = ArticleRepository::getPagination();
        return view(
            'pages.blog', compact('articles')
        );
    }

    public function contact()
    {
        return view(
            'pages.contact'
        );
    }

    public function about()
    {
        return view(
            'pages.about'
        );
    }
}
