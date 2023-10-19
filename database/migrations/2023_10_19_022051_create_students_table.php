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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            //credentials for loggin in
            $table->string('email');
            $table->string('password');

            //personal info
            $table->string('name');
            $table->string('nric');

            //uni info
            $table->string('studentID');
            $table->string('program');
            $table->string('batch');

            //contact info
            $table->string('phoneNumber');
            $table->string('address');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
