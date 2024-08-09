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
        if(!Schema::hasTable('tag')) {
            Schema::create('tag', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('nama')->nullable();
                $table->text('slug')->nullable();
                $table->text('desc')->nullable();
                $table->text('status')->nullable();
              
            });
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag');

    }
};
