<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuedResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issued_resources', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('resource_issued')->nullable();
            $table->foreign('resource_issued')
                ->references('id')
                ->on('resources')
                ->onUpdate('cascade');

            $table->string('resource_issued_to')->nullable();
            $table->foreign('resource_issued_to')
                ->references('student_id')
                ->on('students')
                ->onUpdate('cascade');


            $table->string('issued_by')->nullable();
            $table->foreign('issued_by')
                ->references('username')
                ->on('staff')
                ->onUpdate('cascade');

            $table->date('date_to_return');


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
        Schema::dropIfExists('issued_resources');
    }
}
