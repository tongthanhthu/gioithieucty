<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumVitaesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_vitaes', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable()->comment('Tên người gửi');
            $table->string('phone')->nullable()->comment('Sđt người gửi');
            $table->string('title')->nullable()->comment('Tiêu đề mail');
            $table->string('email')->nullable()->comment('Email người gửi');
            $table->longText('description')->nullable()->comment('Mô tả');
            $table->text('path')->nullable()->comment('Đường dẫn file cv');
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
        Schema::dropIfExists('curriculum_vitaes');
    }
}
