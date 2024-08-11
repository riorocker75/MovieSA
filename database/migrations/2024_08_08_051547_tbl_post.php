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
       
        if(!Schema::hasTable('post')) {
            Schema::create('post', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('judul')->nullable();
                $table->text('slug')->nullable();
                $table->text('poster')->nullable();
                $table->text('desc')->nullable();
                $table->date('tgl')->nullable();
                $table->text('cat_id')->nullable();
                $table->text('tag')->nullable();
                $table->text('rev_id')->nullable();
                $table->text('status')->nullable();
            });
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
