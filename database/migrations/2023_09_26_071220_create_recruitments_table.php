<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_jp')->nullable();
            $table->string('name_kr')->nullable();

            $table->string('slug_vi')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_jp')->nullable();
            $table->string('slug_kr')->nullable();

            $table->string('location_vi')->nullable();
            $table->string('location_en')->nullable();
            $table->string('location_jp')->nullable();
            $table->string('location_kr')->nullable();

            $table->string('exp_vi')->nullable();
            $table->string('exp_en')->nullable();
            $table->string('exp_jp')->nullable();
            $table->string('exp_kr')->nullable();

            $table->string('wage_vi')->nullable();
            $table->string('wage_en')->nullable();
            $table->string('wage_jp')->nullable();
            $table->string('wage_kr')->nullable();

            $table->string('form_vi')->nullable();
            $table->string('form_en')->nullable();
            $table->string('form_jp')->nullable();
            $table->string('form_kr')->nullable();

            $table->string('deadline_vi')->nullable();
            $table->string('deadline_en')->nullable();
            $table->string('deadline_jp')->nullable();
            $table->string('deadline_kr')->nullable();

            $table->string('rank_vi')->nullable();
            $table->string('rank_en')->nullable();
            $table->string('rank_jp')->nullable();
            $table->string('rank_kr')->nullable();

            $table->string('welfare')->nullable();

            $table->longText('description_vi')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_jp')->nullable();
            $table->longText('description_kr')->nullable();

            $table->longText('request_vi')->nullable();
            $table->longText('request_en')->nullable();
            $table->longText('request_jp')->nullable();
            $table->longText('request_kr')->nullable();

            $table->longText('right_vi')->nullable();
            $table->longText('right_en')->nullable();
            $table->longText('right_jp')->nullable();
            $table->longText('right_kr')->nullable();

            $table->longText('other_vi')->nullable();
            $table->longText('other_en')->nullable();
            $table->longText('other_jp')->nullable();
            $table->longText('other_kr')->nullable();

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
        Schema::dropIfExists('recruitments');
    }
}
