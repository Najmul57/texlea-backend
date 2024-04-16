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
            $table->longText('short_about')->nullable();
            $table->longText('long_about')->nullable();
            $table->string('about_image');
            $table->longText('mission')->nullable();
            $table->string('mission_image');
            $table->longText('vission')->nullable();
            $table->string('vission_image');
            $table->longText('quality')->nullable();
            $table->string('quality_image');
            $table->longText('service')->nullable();
            $table->string('service_image');
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
