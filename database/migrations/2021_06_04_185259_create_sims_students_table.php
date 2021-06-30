<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sims_students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->string('fullname');
            $table->string('program')->nullable();
            $table->string('department')->nullable();
            $table->year('entry_year');
            $table->enum('registered',['YES','NO'])->default('YES');
            $table->string('password');

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
        Schema::dropIfExists('sims_students');
    }
}
