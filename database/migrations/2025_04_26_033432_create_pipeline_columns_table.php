<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePipelineColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pipeline_columns', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động làm khóa chính
            $table->foreignId('pipeline_id')->constrained('pipelines')->onDelete('cascade'); // Khóa ngoại tới bảng pipelines
            $table->string('name'); // Tên của cột trong pipeline
            $table->integer('order')->default(0); // Thứ tự của cột
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pipeline_columns'); // Xóa bảng khi rollback
    }
}
