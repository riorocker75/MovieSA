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
        if(!Schema::hasTable('favorit')) {
            Schema::create('favorit', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('user_id')->nullable();
                $table->text('film_id')->nullable();
                $table->text('cat_id')->nullable();
              
            });
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorit');
    }
};
