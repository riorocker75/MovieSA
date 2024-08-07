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
        if(!Schema::hasTable('user_listfilm')) {
            Schema::create('user_listfilm', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('film_id')->nullable();
                $table->text('user_id')->nullable();
                $table->text('status')->nullable();
            });
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_listfilm');
    }
};
