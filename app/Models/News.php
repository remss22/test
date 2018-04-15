<?php
/**
 * Created by PhpStorm.
 * User: eyurkin
 * Date: 14.04.2018
 * Time: 10:19
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fullNews()
    {
        return $this->hasOne(FullNews::class, 'news_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getNewsWithPreview()
    {
        return self::query()->orderBy('time_news', 'desc')->limit(15)->with('fullNews')->get();
    }

    /**
     * @param $newsId
     * @return self|null
     */
    public static function getFullNews($newsId)
    {
        return self::query()->where('id', '=', $newsId)->with('fullNews')->get()->first();
    }
}