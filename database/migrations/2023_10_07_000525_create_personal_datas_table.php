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
        Schema::create('personal_datas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('course');
            $table->string('lname')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('nick_name')->nullable();
            $table->longText('address');
            $table->integer('age');
            $table->longText('birthplace');
            $table->string('mobile_no');
            $table->string('religion');
            $table->string('citizenship');
            $table->string('birthdate');
            $table->string('guardian');
            $table->string('contact_no');
            $table->longText('guardian_address');
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
        Schema::dropIfExists('personal_datas');
    }
};
