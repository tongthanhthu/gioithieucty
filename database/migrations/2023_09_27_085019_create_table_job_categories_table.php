<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableJobCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_categories', function (Blueprint $table) {
            $table->id();
// JobCategory
            $table->string('title_vi')->unique();
            $table->string('title_en')->nullable()->unique();
            $table->string('title_jp')->nullable()->unique();
            $table->string('title_kr')->nullable()->unique();

            $table->string('slug_vi')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_jp')->nullable();
            $table->string('slug_kr')->nullable();

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
        Schema::dropIfExists('job_categories');
    }
}
