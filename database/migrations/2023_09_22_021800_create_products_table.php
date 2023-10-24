<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_vi')->unique()->nullable();
            $table->string('name_en')->unique()->nullable();
            $table->string('name_jp')->unique()->nullable();
            $table->string('name_kr')->unique()->nullable();
            $table->string('client_vi')->nullable();
            $table->string('client_en')->nullable();
            $table->string('client_jp')->nullable();
            $table->string('client_kr')->nullable();
            $table->string('status')->nullable();
            $table->string('slug_vi')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_jp')->nullable();
            $table->string('slug_kr')->nullable();
            $table->string('location_vi')->nullable();
            $table->string('location_en')->nullable();
            $table->string('location_jp')->nullable();
            $table->string('location_kr')->nullable();
            $table->string('building_area_vi')->nullable();
            $table->string('building_area_en')->nullable();
            $table->string('building_area_jp')->nullable();
            $table->string('building_area_kr')->nullable();
            $table->longText('description_vi')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_jp')->nullable();
            $table->longText('description_kr')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
