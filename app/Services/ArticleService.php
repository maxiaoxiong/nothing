<?php


namespace App\Services;


use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\BaseRepository;

class ArticleService extends BaseRepository
{
    protected $articleRepository;

    /**
     * ArticleService constructor.
     * @param $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function save($para, $attach_id)
    {
        if ($article = $this->articleRepository->create($para)) {
            $article->categories()->attach($attach_id);

            return true;
        }

        return false;
    }

    public function update($id, $para, $sync_id)
    {

        if ($article = $this->articleRepository->saveById($id, $para)) {
            
            $article->categories()->sync($sync_id);
            
            return true;
        }
        
        return false;
    }
}