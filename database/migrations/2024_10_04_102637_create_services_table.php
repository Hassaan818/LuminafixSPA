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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->string('image');
            $table->tinyInteger('status')->default(1);
            $table->string('category');
            $table->string('detail_page_heading');
            $table->string('detail_page_image');
            $table->longText('detail_page_description');
            $table->string('detail_page_strategy_heading');
            $table->text('detail_page_strategy_description');
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
