<?php
/**
 * Created by PhpStorm.
 * User: eyurkin
 * Date: 14.04.2018
 * Time: 10:18
 */

namespace App\Http\Services\Rbc\Query;


use App\Http\Services\Rbc\Query\Entity\FullNews;
use App\Http\Services\Rbc\Query\Entity\News;
use App\Http\Services\Rbc\Query\ResponseParser\FullNewsResponse;
use App\Http\Services\Rbc\Query\ResponseParser\LastNewsResponse;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class Query
{
    private $limit;

    private $client;

    public function __construct()
    {
        $this->limit = Config::get('rbc.limit');
        $this->client = new Client(['timeout' => config('rbk.timeout')]);
    }


    /**
     * @return News[]
     */
    public function getLastNews()
    {
        $response = $this->query(Config::get('rbc.url') . '?_=' . microtime());
        return $this->parseLastNewsResponse($response);
    }

    /**
     * @param News $news
     * @return FullNews
     */
    public function getFullNews(News $news) : FullNews
    {
        $response = $this->query($news->getUrl());
        return $this->parseFullNewsResponse($response);
    }

    /**
     * @param $response
     * @return FullNews
     */
    private function parseFullNewsResponse($response) : FullNews
    {
        $fullNews = new FullNewsResponse($response);
        return $fullNews->getResult();
    }

    private function parseLastNewsResponse($response)
    {
        $lastNews = new LastNewsResponse($response);
        return $lastNews->getResult();
    }

    private function query(string $url) :? string
    {
        $response = null;
        try {
            $response = $this->client
                ->get($url)
                ->getBody()
                ->getContents();

        } catch (\Throwable $t) {
            //todo add log
            var_dump($t->getMessage());
        }
        return $response;
    }

}