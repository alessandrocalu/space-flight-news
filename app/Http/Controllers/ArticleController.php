<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    /**
     * HTTP GET (list)
     *
     * @param  Request $request
     * @param  ArticleService $service
     * @return Response
     */
    public function index(Request $request, ArticleService $service)
    {
        $search = $request->has('search') ? $request->input('search') : '';
        $orderBy = $request->has('order') ? $request->input('order') : 'publication_date';
        $direction = $request->has('direction') ? $request->input('direction') : 'desc';
        return $service->searchArticle($search, $orderBy, $direction);
    }

    /**
     * HTTP GET
     *
     * @param  ArticleService $service
     * @param  int  $id
     * @return Response
     */
    public function show(ArticleService $service, $id)
    {
        if ($article = $service->getArticle((int)$id)) {
            return $article;
        }    
        return response('Not Found', 404);
    }
}