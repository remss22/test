<?php
/**
 * Created by PhpStorm.
 * User: eyurkin
 * Date: 14.04.2018
 * Time: 10:56
 */

namespace App\Http\Services\Rbc\Query\Entity;


class News
{
    private $externalId;

    private $time;

    private $url;

    private $title;


    public function __construct($externalId, $time, $url)
    {
        $this->externalId = $externalId;
        $this->time = $time;
        $this->url = $url;

    }


    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getExternalId()
    {
        return $this->externalId;
    }


}

