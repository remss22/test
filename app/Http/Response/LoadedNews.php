<?php
/**
 * Created by PhpStorm.
 * User: eyurkin
 * Date: 14.04.2018
 * Time: 10:28
 */

namespace App\Http\Response;


use Illuminate\Support\Facades\Config;

class LoadedNews
{

    /** @var int  */
    protected $id;

    /** @var string  */
    protected $title;

    /** @var string  */
    protected $preview;

    /** @var string  */
    protected $url;

    /** @var string  */
    protected $time;


    /**
     * LoadedNews constructor.
     * @param int $id
     * @param string $title
     * @param string $preview
     * @param string $url
     * @param string $time
     */
    public function __construct(
        int $id,
        string $title,
        string $preview,
        string $url,
        string $time)
    {
        $this->id         = $id;
        $this->title      = $title;
        $this->preview    = $preview;
        $this->url        = $url;
        $this->time       = $time;
    }


    /**
     * @return array
     */
    public function getDataForResponse()
    {
        return [
            'id'      => $this->id,
            'title'   => $this->title,
            'preview' => html_entity_decode(mb_substr($this->preview, 0, Config::get('rbc.preview_limit'))),
            'url'     => $this->url,
            'time'    => $this->time,
        ];
    }
}