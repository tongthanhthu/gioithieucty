<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->date('formation_time');
            $table->string('image');
            $table->string('title_vi')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_jp')->nullable();
            $table->string('title_kr')->nullable();
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
        Schema::dropIfExists('company_histories');
    }
}
