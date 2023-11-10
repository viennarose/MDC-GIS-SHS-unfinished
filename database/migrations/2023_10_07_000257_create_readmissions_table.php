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
        Schema::create('readmissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('student_name');
            $table->string('course_year');
            $table->string('date1')->nullable();
            $table->string('date2')->nullable();
            $table->string('date3')->nullable();
            $table->longText('reason1')->nullable();
            $table->longText('reason2')->nullable();
            $table->longText('reason3')->nullable();
            $table->longText('subject_affected1')->nullable();
            $table->longText('subject_affected2')->nullable();
            $table->longText('subject_affected3')->nullable();
            $table->tinyInteger('granted');
            $table->longText('guidance_sig');
            $table->longText('osad_sig');
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
        Schema::dropIfExists('readmissions');
    }
};
