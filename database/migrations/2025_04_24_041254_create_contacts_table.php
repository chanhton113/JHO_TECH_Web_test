<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->string('contact_id')->primary(); 
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable(); 
            $table->string('address')->nullable();
            $table->string('opportunity')->nullable();
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
        // Xoá bảng contacts khi rollback migration
        Schema::dropIfExists('contacts');
    }
};
