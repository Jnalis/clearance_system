<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLostResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_resources', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lost_resource')->nullable();
            $table->foreign('lost_resource')->references('id')->on('resources')->onUpdate('cascade');

            $table->string('lost_by')->nullable();
            $table->foreign('lost_by')
                ->references('student_id')
                ->on('students')
                ->onUpdate('cascade');

            $table->string('added_by')->nullable();
            $table->foreign('added_by')
                ->references('username')
                ->on('staff')
                ->onUpdate('cascade');

            $table->enum('refunded_status', ['REFUNDED','NOT REFUNDED'])->default('NOT REFUNDED');

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
        Schema::dropIfExists('lost_resources');
    }
}
