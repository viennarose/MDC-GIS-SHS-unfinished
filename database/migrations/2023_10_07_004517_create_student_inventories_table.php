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
        Schema::create('student_inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('acad_year');
            $table->unsignedBigInteger('personal_id');
            $table->unsignedBigInteger('fambackground_id');
            $table->unsignedBigInteger('siblings_id');
            $table->unsignedBigInteger('educ_id');
            $table->string('signature')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade');
            $table->foreign('personal_id')->references('id')->on('personal_datas')
            ->onUpdate('cascade');
            $table->foreign('fambackground_id')->references('id')->on('family_backgrounds')
            ->onUpdate('cascade');
            $table->foreign('siblings_id')->references('id')->on('siblings')
            ->onUpdate('cascade');
            $table->foreign('educ_id')->references('id')->on('educational_backgrounds')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_inventories');
    }
};
