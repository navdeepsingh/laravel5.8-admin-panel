<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedemptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redemption', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('signup_id')->index();
            $table->unsignedBigInteger('outlet_id')->index()->nullable();
            $table->string('redeem_code');
            $table->timestamps();
        });

         Schema::table('redemption', function (Blueprint $table) {
            $table->foreign('signup_id')->references('id')->on('signups')->onDelete('cascade');;
            $table->foreign('outlet_id')->references('id')->on('outlets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('redemption');
    }
}
