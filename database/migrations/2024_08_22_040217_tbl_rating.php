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
        if(!Schema::hasTable('rating')) {
            Schema::create('rating', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('film_id')->nullable();
                $table->text('user_id')->nullable();
                $table->text('rating')->nullable();
                $table->date('tgl')->nullable();
            });
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating');

    }
};
