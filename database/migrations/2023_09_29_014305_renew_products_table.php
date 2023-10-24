<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenewProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_vi')->unique()->nullable();
            $table->string('name_en')->unique()->nullable();
            $table->string('name_jp')->unique()->nullable();
            $table->string('name_kr')->unique()->nullable();
            $table->string('slug_vi')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_jp')->nullable();
            $table->string('slug_kr')->nullable();
            $table->text('info_product_vi')->nullable();
            $table->text('info_product_en')->nullable();
            $table->text('info_product_jp')->nullable();
            $table->text('info_product_kr')->nullable();
            $table->text('description_vi')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_jp')->nullable();
            $table->text('description_kr')->nullable();
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
