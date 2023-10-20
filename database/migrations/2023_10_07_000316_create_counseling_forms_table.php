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
        Schema::create('counseling_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('student_name');
            $table->string('date');
            $table->string('course_year');
            $table->string('department');
            $table->string('contact_num');
            $table->string('visit_nature');
            $table->longText('concern');
            $table->longText('action_taken');
            $table->longText('followup_dates');
            $table->string('counselee');
            $table->string('counselor');
            $table->string('session_ended');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counseling_forms');
    }
};
