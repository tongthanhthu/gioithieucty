<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyIntroduceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_introduce', function (Blueprint $table) {
            $table->id();
            $table->string('company_name_vi')->comment('tên cty');
            $table->string('company_name_en')->nullable();
            $table->string('company_name_jp')->nullable();
            $table->string('company_name_kr')->nullable();

            $table->integer('experience')->comment('kinh nghiệm trong lĩnh vực');
            
            $table->longText('description_short_vi')->comment('mô tả ngắn');
            $table->longText('description_short_en')->nullable();
            $table->longText('description_short_jp')->nullable();
            $table->longText('description_short_kr')->nullable();

            $table->longText('description_vi')->nullable()->comment('nội dung giới thiệu');
            $table->longText('description_en')->nullable();
            $table->longText('description_jp')->nullable();
            $table->longText('description_kr')->nullable();

            $table->longText('company_diagram_vi')->nullable()->comment('sơ đồ tổ chức');
            $table->longText('company_diagram_en')->nullable();
            $table->longText('company_diagram_jp')->nullable();
            $table->longText('company_diagram_kr')->nullable();

            $table->longText('mission_vi')->nullable()->comment('sứ mệnh');
            $table->longText('mission_en')->nullable();
            $table->longText('mission_jp')->nullable();
            $table->longText('mission_kr')->nullable();
            
            $table->longText('vision_vi')->nullable()->comment('tầm nhìn');
            $table->longText('vision_en')->nullable();
            $table->longText('vision_jp')->nullable();
            $table->longText('vision_kr')->nullable();
            
            $table->text('core_value_vi')->nullable()->comment('giá trị cốt lõi');
            $table->text('core_value_en')->nullable();
            $table->text('core_value_jp')->nullable();
            $table->text('core_value_kr')->nullable();
            
            $table->longText('business_philosophy_vi')->nullable()->comment('triết lý kinh doanh');
            $table->longText('business_philosophy_en')->nullable();
            $table->longText('business_philosophy_jp')->nullable();
            $table->longText('business_philosophy_kr')->nullable();
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
        Schema::dropIfExists('company_introduce');
    }
}
