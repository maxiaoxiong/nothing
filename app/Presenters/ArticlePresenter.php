<?php
namespace App\Presenters;

use App\Models\Article;

class ArticlePresenter
{
    public function judgeCategorySelected(Article $article = null, $value)
    {
        if ($article == null) {
            return '';
        }
        $category_ids = $article->categories->pluck('id')->toArray();
        if (in_array($value,$category_ids)) {
            return 'selected';
        }
        return '';
    }
}

