<?php
/**
 * Created by PhpStorm.
 * User: eyurkin
 * Date: 14.04.2018
 * Time: 15:17
 */

namespace App\Http\Services\Rbc\Query\Entity;


class FullNews
{

    private $title;

    private $text;

    private $image;

    private $newsId;


    /**
     * FullNews constructor.
     * @param string $title
     * @param string $text
     * @param string|null $image
     */
    public function __construct(string $title, string $text, $image = null)
    {
        $this->title = $title;
        $this->text  = $text;
        $this->image = $image;
    }

    /**
     * @return null|string
     */
    public function getImage() :? string
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getNewsId()
    {
        return $this->newsId;
    }

    /**
     * @param mixed $newsId
     */
    public function setNewsId($newsId)
    {
        $this->newsId = $newsId;
    }

}