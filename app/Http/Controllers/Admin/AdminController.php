<?php
/**
 * Created by PhpStorm.
 * User: eyurkin
 * Date: 13.04.2018
 * Time: 15:23
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Models\News;
use App\Http\Response\FullNews;
use App\Http\Response\LoadedNews;
use App\Http\Services\Rbc\Loader;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{
    /** @var Loader */
    protected $rbcLoaderService;

    public function __construct()
    {
        $this->rbcLoaderService = resolve(Loader::class);
    }

    public function loadAllNews()
    {
        $news = News::getNewsWithPreview();
        $result = [];
        foreach ($news as $item) {
            $responseNews = new LoadedNews(
                $item->id,
                $item->title,
                $item->fullNews->text,
                $item->url,
                $item->time_news
            );

            $result[] = $responseNews->getDataForResponse();
        }

        return new JsonResponse(['data' => $result, 'status' => 'success']);
    }


    public function loadFullNewsByNewsId($newsId)
    {
        $news = News::getFullNews($newsId);
        if ($news !== null) {
            $fullNews = new FullNews(
                $news->id,
                $news->title,
                $news->fullNews->text,
                $news->url,
                $news->fullNews->image);
            $result = ['data' => $fullNews->getDataForResponse(), 'status' => 'success'];
        } else {
            $result = ['data' => null, 'status' => 'error'];
        }

        return new JsonResponse($result);
    }


    public function loadLastNews()
    {
        $this->rbcLoaderService->loadLastNews();
        return new JsonResponse(['status' => 'success']);
    }

}