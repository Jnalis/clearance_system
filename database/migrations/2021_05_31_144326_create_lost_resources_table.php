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

            $table->unsignedBigInteger('lost_by')->nullable();
            $table->foreign('lost_by')->references('id')->on('students')->onUpdate('cascade');

            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('staff')->onUpdate('cascade');

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
