<?php
/**
 * Created by PhpStorm.
 * User: eyurkin
 * Date: 15.04.2018
 * Time: 10:05
 */

namespace App\Http\Response;


class FullNews
{

    /** @var int  */
    protected $id;

    /** @var string  */
    protected $title;

    /** @var string  */
    protected $text;

    /** @var string  */
    protected $url;

    /** @var  string|null */
    protected $image;


    /**
     * FullNews constructor.
     * @param int $id
     * @param string $title
     * @param string $text
     * @param string $url
     * @param null $image
     */
    public function __construct(
        int $id,
        string $title,
        string $text,
        string $url,
        $image = null)
    {
        $this->id    = $id;
        $this->title = $title;
        $this->text  = $text;
        $this->url   = $url;
        $this->image = $image;
    }


    /**
     * @return array
     */
    public function getDataForResponse()
    {
        return [
            'id'    => $this->id,
            'title' => html_entity_decode($this->title),
            'text'  => html_entity_decode($this->text),
            'url'   => $this->url,
            'image' => $this->image,
        ];
    }

}