<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_cn', 20)->comment('標記名稱CN');
            $table->string('name_en', 20)->comment('標記名稱EN');
            $table->string('name_jp', 20)->comment('標記名稱JP');
            $table->text('content_cn')->comment('標記內容CN');
            $table->text('content_en')->comment('標記內容EN');
            $table->text('content_jp')->comment('標記內容JP');
            $table->unsignedSmallInteger('parent_id')->nullable()->comment('標記上層ID');
            $table->string('icon', 100)->comment('標記ICON');
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
        Schema::dropIfExists('tags');
    }
}
