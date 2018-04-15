<?php
/**
 * Created by PhpStorm.
 * User: eyurkin
 * Date: 14.04.2018
 * Time: 10:47
 */

namespace App\Http\Services\Rbc\Query\ResponseParser;


use App\Http\Services\Rbc\Query\Entity\News;
use Illuminate\Support\Facades\Config;

class LastNewsResponse extends AbstractResponseParser
{
    /** @var News[] */
    private $news = [];


    protected function parseResponse()
    {
        $this->decodeResponse();
        $items = array_get($this->response, 'items', []);
        $newsUrl = $this->handleNewsUrl($items);
        $items = array_filter($items, function ($item) use ($newsUrl) {
            return array_key_exists(array_get($item, 'id'), $newsUrl);
        });

        $items = array_slice($items, 0, Config::get('rbc.limit'));
        foreach ($items as $item) {
            $externalId = array_get($item, 'id');
            $time = array_get($item, 'time_t');
            $url = array_get($newsUrl, $externalId);
            $news = new News(
                $externalId,
                $time,
                $url
            );
            $this->news[] = $news;
        }
    }


    /**
     * @param string $html
     * @return null|string
     */
    private function parseUrl(string $html)
    {
        $dom = new \DOMDocument();
        $dom->loadHTML($html);
        $list = $dom->getElementsByTagName('a');
        $url = null;
        if ($list->length > 0) {
            /** @var \DOMElement $item */
            foreach ($list as $item) {
                $url = $item->getAttribute('href');
                break;
            }
        }
        return $url;
    }

    /**
     * @param array $news
     * @return array
     */
    private function handleNewsUrl(array $news)
    {
        $rbcUrl = 'https://www.rbc.ru/';
        $result = [];
        foreach ($news as $item) {
            $newsUrl = $this->parseUrl(array_get($item, 'html', ''));
            if (strpos($newsUrl, $rbcUrl) !== false) {
                $result[array_get($item, 'id')] = $newsUrl;
            }
        }
        return $result;
    }


    public function getResult()
    {
        return $this->news;
    }

}