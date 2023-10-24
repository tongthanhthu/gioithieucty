<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeUrlFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->string('url_vi')->nullable()->change();
            $table->string('url_en')->nullable()->change();
            $table->string('url_jp')->nullable()->change();
            $table->string('url_kr')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->string('url_vi')->nullable(false)->change();
            $table->string('url_en')->nullable(false)->change();
            $table->string('url_jp')->nullable(false)->change();
            $table->string('url_kr')->nullable(false)->change();
        });
    }
}
