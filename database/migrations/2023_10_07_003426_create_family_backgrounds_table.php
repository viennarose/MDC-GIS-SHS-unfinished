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
        Schema::create('family_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('mother_name')->nullable();
            $table->string('father_name')->nullable();
            $table->longText('mother_address')->nullable();
            $table->longText('father_address')->nullable();
            $table->string('father_religion')->nullable();
            $table->string('mother_religion')->nullable();
            $table->string('mother_nationality')->nullable();
            $table->string('father_nationality')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_employmentplace')->nullable();
            $table->string('father_employmentplace')->nullable();
            $table->string('parent_status')->nullable();
            $table->string('siblings')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_backgrounds');
    }
};
