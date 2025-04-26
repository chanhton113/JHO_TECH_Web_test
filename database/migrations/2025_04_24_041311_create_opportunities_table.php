<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->string('opportunitie_id')->primary(); 
            $table->string('phase');
            $table->string('organisation');
            $table->string('contact_id'); // phải là string để khớp kiểu dữ liệu
            $table->foreign('contact_id')->references('contact_id')->on('contacts')->onDelete('cascade');
            $table->string('name');
            $table->decimal('value', 15, 2); 
            $table->date('closing_date'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opportunities');
    }
};