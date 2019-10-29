<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('daily_reward_id')->unsigned();
            $table->integer('reward_amount');
            $table->timestamps();
        });
        Schema::table('transaction', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('daily_reward_id')->references('id')->on('daily_rewards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('transaction');
    }
}
