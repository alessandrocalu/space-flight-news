<?php

namespace App\Services;

use App\Repositories\ArticleRepository;

class ArticleService
{
    private $articleRepository;

    /**
     * @param ArticleRepository $articleRepository
     * @constructor
     */
    public function __construct(
        ArticleRepository $articleRepository
    ) {
        $this->articleRepository = $articleRepository;
    }

    public function searchArticle(
        $search = '', 
        $orderBy = 'publication_date', 
        $direction = 'desc'
    ) {
        return $this->articleRepository->search($search, $orderBy, $direction);
    }

    public function getArticle($id)
    {
        if ($article = $this->articleRepository->get((int)$id)) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'abstract' => $article->abstract,
                'image' => $article->image,
                'publication_date' => $article->publication_date
            ];
        }    
    }

    public function storeArticle($data)
    {
        $data["publication_date"] = new \DateTime();
        $article = $this->articleRepository->store($data);
        return $this->getArticle($article->id);
    }

    public function updadeArticle($id, $data)
    {
        if ($article = $this->articleRepository->get((int)$id)) {
            $article = $this->articleRepository->update((int)$id, $data);
        } else {
            $article = $this->articleRepository->store($data);
        }
        return $this->getArticle($article->id);
    }
}