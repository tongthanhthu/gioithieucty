<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbout404Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about404', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description_vi')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_jp')->nullable();
            $table->text('description_kr')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('about404');
    }
}
