<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('timework_vi')->nullable();
            $table->string('timework_en')->nullable();
            $table->string('timework_jp')->nullable();
            $table->string('timework_kr')->nullable();
            $table->longText('address_vi');
            $table->longText('address_en')->nullable();
            $table->longText('address_jp')->nullable();
            $table->longText('address_kr')->nullable();
            $table->string('about_vi')->nullable();
            $table->string('about_en')->nullable();
            $table->string('about_jp')->nullable();
            $table->string('about_kr')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
