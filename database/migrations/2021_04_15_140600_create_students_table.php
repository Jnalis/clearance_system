<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
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
            $table->string('student_id');
            $table->string('fullname');
            $table->string('program')->nullable();
            $table->string('department')->nullable();
            $table->year('entry_year');
            $table->enum('registered',['YES','NO'])->default('YES');
            $table->string('password');
            $table->foreign('program')->references('prog_code')->on('programs')->onUpdate('cascade');
            $table->foreign('department')->references('dept_code')->on('departments')->onUpdate('cascade');
            $table->timestamps();
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
}
