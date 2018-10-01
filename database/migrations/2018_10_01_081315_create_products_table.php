<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('tag_id')->comment('標籤ID');
            $table->string('title_cn', 30)->comment('產品名稱CN');
            $table->string('title_en', 30)->comment('產品名稱EN');
            $table->string('title_jp', 30)->comment('產品名稱JP');
            $table->text('content_cn')->comment('產品內容CN');
            $table->text('content_en')->comment('產品內容EN');
            $table->text('content_jp')->comment('產品內容JP');
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
        Schema::dropIfExists('products');
    }
}
