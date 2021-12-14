<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Entities\Article;

class ArticleRepository extends BaseRepository
{
    /**
     * @param Article $articleModel
     * @constructor
     */
    public function __construct(
        Article $articleModel
    ) {
        $this->model = $articleModel;
    }

    public function search(
        $search, 
        $orderBy = 'publication_date', 
        $direction = 'asc'
    ) {

        if (! empty($search)) {
            $result = $this->model
                ->where('title', 'like', "%{$search}%")
                ->orderBy($orderBy, $direction);
        } else {
            $result = $this->model
                ->orderBy($orderBy, $direction);
        }

        return $result->get();
    }
}