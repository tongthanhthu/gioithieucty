<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChooseUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choose_us', function (Blueprint $table) {
            $table->id();
            $table->mediumText('content_vi')->nullable();
            $table->mediumText('content_en')->nullable();
            $table->mediumText('content_jp')->nullable();
            $table->mediumText('content_kr')->nullable();
            $table->string('link_video')->nullable();
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
        Schema::dropIfExists('choose_us');
    }
}
