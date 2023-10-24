<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title_vi')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_jp')->nullable();
            $table->string('title_kr')->nullable();
            $table->longText('description_vi')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_jp')->nullable();
            $table->longText('description_kr')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->nullable();
            $table->integer('priority')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
