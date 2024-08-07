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
        if(!Schema::hasTable('user')) {
            Schema::create('user', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('username')->nullable();
                $table->text('password')->nullable();
               $table->text('level')->comment('1=admin,2=user');
               $table->text('status')->comment('1=aktif, 0=non');
            });
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
