<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllocatedResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocated_resources', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('allocated_by')->nullable();
            $table->foreign('allocated_by')->references('id')->on('staff')->onDelete('cascade')->onUpdate('cascade');
            $table->string('allocated_to');
            $table->unsignedBigInteger('resource_id');
            $table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status',['ISSUED','NOT ISSUED'])->default('NOT ISSUED');
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
        Schema::dropIfExists('allocated_resources');
    }
}
