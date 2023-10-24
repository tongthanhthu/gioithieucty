<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->default(0);
            $table->string('name_vi', 250)->unique();
            $table->string('name_en', 250)->unique()->nullable();
            $table->string('name_jp', 250)->unique()->nullable();
            $table->string('name_kr', 250)->unique()->nullable();
            $table->string('slug_vi', 250)->nullable();
            $table->string('slug_en', 250)->nullable();
            $table->string('slug_jp', 250)->nullable();
            $table->string('slug_kr', 250)->nullable();
            $table->longText('description_vi')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_jp')->nullable();
            $table->longText('description_kr')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('position')->default(0);
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
        Schema::dropIfExists('categories');
    }
}
