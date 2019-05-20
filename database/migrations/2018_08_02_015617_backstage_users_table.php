<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BackstageUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Backstage_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('IsCancel')->default(1);
            $table->integer('level_id')->default(2);
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
        Schema::dropIfExists('Backstage_users');
    }
}
