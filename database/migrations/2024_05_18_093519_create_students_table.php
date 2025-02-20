<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('school_year')->nullable();
            $table->string('school_id')->nullable();
            $table->string('category')->nullable()->index();
            $table->string('course')->nullable();
            $table->string('lname')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('ext')->nullable();
            $table->string('gender')->nullable();
            $table->string('brgy')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('hei_name')->nullable();
            $table->string('institutional_code')->nullable();
            $table->integer('types_of_heis')->nullable();
            $table->string('program_level_code')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('status')->nullable()->index();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
