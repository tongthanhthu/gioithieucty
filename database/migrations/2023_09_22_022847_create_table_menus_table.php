<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name_vi', 250)->nullable();
            $table->string('name_en', 250)->nullable();
            $table->string('name_jp', 250)->nullable();
            $table->string('name_kr', 250)->nullable();
            $table->integer("parent_id")->nullable()->default(0);
            $table->integer("position")->nullable()->default(1);
            $table->string("url", 500)->nullable();
            $table->tinyInteger('layout')->nullable()->default(0);
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
        Schema::dropIfExists('menus');
    }
}
