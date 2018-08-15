<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessuserHistorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_user_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('station_id')->unsigned();
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
            $table->integer('access_user_id')->unsigned();
            $table->foreign('access_user_id')->references('id')->on('access_users')->onDelete('cascade');
            $table->integer('licensed');
            $table->integer('tested');
            $table->date('check_date');
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
        Schema::dropIfExists('access_user_histories');
    }
}
