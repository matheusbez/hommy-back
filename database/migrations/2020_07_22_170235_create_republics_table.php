<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("adress");
            $table->string("zipcode");
            $table->string("phone")->unique();
            $table->float("price")->unsigned();
            $table->integer("bathrooms")->unsigned();
            $table->integer("bedrooms")->unsigned();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });

        Schema::table('republics', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
