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
        Schema::create('educational_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('nursery_school')->nullable();
            $table->string('nursery_address')->nullable();
            $table->string('nursery_year')->nullable();
            $table->string('nursery_honors')->nullable();
            $table->string('elem_school')->nullable();
            $table->string('elem_address')->nullable();
            $table->string('elem_year')->nullable();
            $table->string('elem_honors')->nullable();
            $table->string('junior_school')->nullable();
            $table->string('junior_address')->nullable();
            $table->string('junior_year')->nullable();
            $table->string('junior_honors')->nullable();
            $table->string('senior_school')->nullable();
            $table->string('senior_address')->nullable();
            $table->string('senior_year')->nullable();
            $table->string('senior_honors')->nullable();
            $table->string('scholarship')->nullable();
            $table->string('awards')->nullable();
            $table->longText('organizations')->nullable();
            $table->longText('talents')->nullable();
            $table->longText('athletics')->nullable();
            $table->longText('pasttime')->nullable();
            $table->longText('fav_subject')->nullable();
            $table->longText('fav_reason')->nullable();
            $table->longText('personal_traits')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_backgrounds');
    }
};
