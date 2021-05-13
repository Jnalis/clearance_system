<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->enum('certificate_status',['ISSUED','NOT ISSUED']);
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('clearance_id')->nullable();
            $table->unsignedBigInteger('issued_by')->nullable();

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onUpdate('cascade');
            $table->foreign('clearance_id')
                ->references('id')
                ->on('clearancetypes')
                ->onUpdate('cascade');
            $table->foreign('issued_by')
                ->references('id')
                ->on('staff')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('certificates');
    }
}
