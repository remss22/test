<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewsTables extends Migration
{
    const CREATE_TIME = 'CURRENT_TIMESTAMP';
    const UPDATE_TIME = 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP';


    public function up()
    {
        try {
            Schema::create('news', function (Blueprint $table) {
                $table->increments('id');
                $table->string('external_id', 255);
                $table->string('title', 255);
                $table->string('url', 255);
                $table->timestamp('time_news');
                $table->timestamp('created_at')->default(DB::raw(self::CREATE_TIME));
                $table->timestamp('updated_at')->default(DB::raw(self::UPDATE_TIME));
            });

            Schema::create('full_news', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('news_id')->unsigned()->index();
                $table->text('text');
                $table->string('image', 255)->nullable();
                $table->timestamp('created_at')->default(DB::raw(self::CREATE_TIME));
                $table->timestamp('updated_at')->default(DB::raw(self::UPDATE_TIME));

                $table->foreign('news_id')
                    ->references('id')->on('news')
                    ->onDelete('restrict')->onUpdate('cascade');
            });
            \DB::commit();
        } catch (\Throwable $t) {
            \DB::rollBack();
            $this->down();
            throw $t;
        }
    }

    public function down()
    {
        \DB::transaction(function () {
            Schema::dropIfExists('full_news');
            Schema::dropIfExists('news');
        });
    }
}
