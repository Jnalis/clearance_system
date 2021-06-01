<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('resource_type');
            $table->string('resource_amount');
            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('allocated_by')->nullable();
            $table->unsignedBigInteger('issued_by')->nullable();

            $table->enum('allocated',['YES','NO'])->default('NO'); //for allocated resource
            $table->enum('issued',['YES','NO'])->default('NO'); //for issued resource
            $table->enum('available',['YES','NO'])->default('YES'); //for lost resource

            $table->foreign('added_by')
                ->references('id')
                ->on('staff')
                ->onDelete('cascade')->onUpdate('cascade');


            $table->foreign('allocated_by')
                ->references('id')
                ->on('staff')
                ->onDelete('cascade')->onUpdate('cascade');


            $table->foreign('issued_by')
                ->references('id')
                ->on('staff')
                ->onDelete('cascade')->onUpdate('cascade');

                
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
        Schema::dropIfExists('resources');
    }
}
