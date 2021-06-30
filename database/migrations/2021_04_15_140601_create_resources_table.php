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

            $table->string('added_by')->nullable();

            $table->string('allocated_by')->nullable();

            $table->string('allocated_to')->nullable();

            $table->enum('allocated',['YES','NO'])->default('NO'); //for allocated resource

            $table->enum('available',['YES','NO'])->default('YES'); //for lost resource

            $table->enum('issued',['YES','NO'])->default('NO'); //for issued resource
            

            $table->foreign('allocated_to')
                ->references('username')
                ->on('staff')
                ->onUpdate('cascade');

            $table->foreign('added_by')
                ->references('username')
                ->on('staff')
                ->onUpdate('cascade');

            $table->foreign('allocated_by')
                ->references('username')
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
        Schema::dropIfExists('resources');
    }
}
