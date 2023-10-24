<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ceo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_jp')->nullable();
            $table->string('name_kr')->nullable();
            $table->string('position_vi')->nullable();
            $table->string('position_en')->nullable();
            $table->string('position_jp')->nullable();
            $table->string('position_kr')->nullable();
            $table->longText('description_vi')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_jp')->nullable();
            $table->longText('description_kr')->nullable();
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
        Schema::dropIfExists('ceo');
    }
}
