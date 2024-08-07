<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('user_detail')) {
            Schema::create('user_detail', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('user_id')->nullable();
                $table->text('nama')->nullable();
               $table->text('gender')->nullable();
               $table->text('email')->nullable();
               $table->text('umur')->nullable();
               $table->text('phone')->nullable();
               $table->text('point')->nullable();
            });
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_detail');
    }
};
