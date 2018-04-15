<?php
/**
 * Created by PhpStorm.
 * User: eyurkin
 * Date: 14.04.2018
 * Time: 10:14
 */

namespace App\Http\Services\Rbc;


use App\Http\Models\FullNews;
use App\Http\Models\News;
use App\Http\Services\Rbc\Query\Entity\News as LoadedNews;
use App\Http\Services\Rbc\Query\Entity\FullNews as LoadedFullNews;
use App\Http\Services\Rbc\Query\Query;

class Loader
{
    /** @var Query */
    protected $queryService;

    public function __construct()
    {
        $this->queryService = resolve(Query::class);
    }

    public function loadLastNews()
    {
        $lastNews = $this->queryService->getLastNews();
        $lastNews = $this->filterStoredNews($lastNews);
        $fullNews = $this->getFullNews($lastNews);

        $this->storeFullNews($fullNews);
    }

    /**
     * @param LoadedNews[] $lastNews
     * @return array
     */
    private function getFullNews(array $lastNews)
    {
        $fullNewsToStore = [];
        foreach ($lastNews as $item) {
            $fullNews = $this->queryService->getFullNews($item);
            $item->setTitle($fullNews->getTitle());
            $newsId = $this->storeLastNews($item);
            $fullNews->setNewsId($newsId);
            $fullNewsToStore[] = $fullNews;
        }

        return $fullNewsToStore;
    }

    /**
     * @param LoadedNews $loadedNews
     * @return mixed
     */
    private function storeLastNews(LoadedNews $loadedNews)
    {
        $news = new News();
        $news->title = $loadedNews->getTitle();
        $news->external_id = $loadedNews->getExternalId();
        $news->url = $loadedNews->getUrl();
        $news->time_news = (new \DateTime())->setTimestamp($loadedNews->getTime());
        $news->save();
        return $news->id;
    }

    /**
     * @param LoadedFullNews[] $fullNews
     */
    private function storeFullNews(array $fullNews)
    {
        $fullNewsToStore = [];
        foreach ($fullNews as $item) {
            $news = new FullNews();
            $news->news_id = $item->getNewsId();
            $news->text = $item->getText();
            $news->image = $item->getImage();
            $fullNewsToStore[] = $news->attributesToArray();
        }

        FullNews::insert($fullNewsToStore);
    }

    /**
     * @param LoadedNews[] $lastNews
     * @return array
     */
    private function filterStoredNews(array $lastNews)
    {
        $externalIds = array_map(function (LoadedNews $news) {
            return $news->getExternalId();
        }, $lastNews);
        $storedNews = News::query()->whereIn('external_id', $externalIds)->get()->groupBy('external_id');
        $result = [];
        foreach ($lastNews as $news) {
            if (!array_key_exists($news->getExternalId(), $storedNews->all())) {
                $result[] = $news;
            }
        }

        return $result;
    }
}