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
        Schema::create('for_councilors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_id');
            $table->string('test_name')->nullable();
            $table->string('test_date')->nullable();
            $table->string('administration_pace')->nullable();
            $table->longText('result_summary')->nullable();
            $table->longText('remarks')->nullable();
            $table->longText('student_Sig')->nullable();
            $table->longText('guidance_staff')->nullable();
            $table->longText('guidance_councilor')->nullable();
            $table->timestamps();

            $table->foreign('inventory_id')->references('id')->on('student_inventories')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('for_councilors');
    }
};
