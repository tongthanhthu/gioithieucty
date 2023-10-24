<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUrlMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->renameColumn('url', 'url_vi');
            $table->string('url_en')->after('position');
            $table->string('url_jp')->after('position');
            $table->string('url_kr')->after('position');
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
            $table->renameColumn('url_vi', 'url');
            $table->dropColumn('url_en');
            $table->dropColumn('url_jp');
            $table->dropColumn('url_kr');
        });
    }
}
