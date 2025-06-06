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
        Schema::table('opportunities', function (Blueprint $table) {
            $table->string('manager_id')->nullable(); 
            $table->string('tag_id')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->dropColumn(['manager_id', 'tag_id', 'created_by', 'updated_by']);
        });
    }
};
