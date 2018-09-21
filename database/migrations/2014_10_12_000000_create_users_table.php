<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('主鍵');
            $table->string('name', 50)->unique()->comment('名稱');
            $table->string('email')->unique()->comment('信箱');
            $table->boolean('is_action')->comment('是否啟用');
            $table->string('password')->comment('密碼');
            $table->string('api_key', 32)->comment('API_Key');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
