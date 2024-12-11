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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('breadcrumb_short_description');
            $table->text('breadcrumb_description')->nullable();
            $table->text('breadcrumb_heading')->nullable();
            $table->string('wwa_heading');
            $table->longText('wwa_description');
            $table->string('wca_heading');
            $table->text('wca_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
