<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('title_vi')->unique();
            $table->string('title_en')->nullable()->unique();
            $table->string('title_jp')->nullable()->unique();
            $table->string('title_kr')->nullable()->unique();
            $table->string('slug_vi')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_jp')->nullable();
            $table->string('slug_kr')->nullable();
            $table->longText('description_short_vi');
            $table->longText('description_short_en')->nullable();
            $table->longText('description_short_jp')->nullable();
            $table->longText('description_short_kr')->nullable();
            $table->longText('description_vi');
            $table->longText('description_en')->nullable();
            $table->longText('description_jp')->nullable();
            $table->longText('description_kr')->nullable();
            $table->string('tag_vi')->nullable();
            $table->string('tag_en')->nullable();
            $table->string('tag_jp')->nullable();
            $table->string('tag_kr')->nullable();
            $table->string('author')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
