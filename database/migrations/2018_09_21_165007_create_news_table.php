<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_cn', 50)->comment('新聞標題CN');
            $table->string('title_en', 50)->comment('新聞標題EN');
            $table->string('title_jp', 50)->comment('新聞標題JP');
            $table->text('content_cn')->nullable()->comment('新聞內文CN');
            $table->text('content_en')->nullable()->comment('新聞內文EN');
            $table->text('content_jp')->nullable()->comment('新聞內文JP');
            $table->timestamp('publish_at')->comment('發布時間(以此欄位排序)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
