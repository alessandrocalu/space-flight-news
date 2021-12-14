<?php

namespace App\Routines;

use App\Services\ArticleService;
use App\Console\Commands\SyncArticleCommand;

class SyncArticleRoutine
{
    /**
     * @param ArticleService $service
     * @constructor
     */
    public function __construct(
        ArticleService $service
    ) {
        $this->service = $service;
    }

    private function getAPIArticles() {
        $endpoint = "https://api.spaceflightnewsapi.net/v3/articles";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint);
        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
        return json_decode($content, true);
    }

    public function run(SyncArticleCommand $command, $params = [])
    {
        $listArticles = $this->getAPIArticles();
        foreach ($listArticles as $article) {
            dump($article); die();
        }
    }
}