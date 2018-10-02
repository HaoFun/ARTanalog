<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('displays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('corporation_cn', 50);
            $table->string('corporation_en', 50);
            $table->string('corporation_jp', 50);
            $table->string('zip_code', 7);
            $table->string('address_cn', 100);
            $table->string('address_en', 100);
            $table->string('address_jp', 100);
            $table->string('logo', 255);
            $table->string('display_image', 255);
            $table->string('tel', 30);
            $table->string('fax', 30);
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
        Schema::dropIfExists('displays');
    }
}
