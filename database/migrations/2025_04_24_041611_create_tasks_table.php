<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->string('task_id')->primary();
            $table->string('title');
            $table->date('start_date');
            $table->string('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->enum('status', ['pending', 'completed', 'in-progress'])->default('pending');
            $table->date('end_date');
            $table->string('contact_id')->nullable();
            $table->foreign('contact_id')->references('contact_id')->on('contacts')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
