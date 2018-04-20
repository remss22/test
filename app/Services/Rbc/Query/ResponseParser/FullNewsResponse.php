<?php
/**
 * Created by PhpStorm.
 * User: eyurkin
 * Date: 14.04.2018
 * Time: 14:21
 */

namespace App\Http\Services\Rbc\Query\ResponseParser;


use App\Http\Services\Rbc\Query\Entity\FullNews;

class FullNewsResponse extends AbstractResponseParser
{
    /** @var  \simple_html_dom */
    private $parsedHtml;

    private $fullNews;

    protected function parseResponse()
    {
        $this->parsedHtml = str_get_html($this->response);

        $this->fullNews = new FullNews(
            $this->getTitle(),
            $this->getText(),
            $this->getImg()
        );
    }

    /**
     * @return null|string
     */
    private function getTitle() :? string
    {
        return $this->getHtmlParseResult('div.article__header__title', 'plaintext', '');
    }

    /**
     * @return null|string
     */
    private function getText() :? string
    {
        return $this->getHtmlParseResult('div.article__content', 'plaintext', '');
    }

    /**
     * @return null|string
     */
    private function getImg() :? string
    {
        return $this->getHtmlParseResult('img.article__main-image__image', 'src');
    }

    /**
     * @param string $className
     * @param string $property
     * @param null $default
     * @return null|string
     */
    private function getHtmlParseResult(string $className, string $property, $default = null)
    {
        $result = null;
        foreach ($this->parsedHtml->find($className) as $item) {
            $result = trim($item->$property);
            break;
        }

        return $result !== null ? $result : $default;
    }

    public function getResult()
    {
        return $this->fullNews;
    }

}