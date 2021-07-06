<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClearancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clearances', function (Blueprint $table) {
            $table->id();
            
            $table->string('clearance_type')->nullable();

            $table->string('student_id')->nullable();
            $table->foreign('student_id')
                ->references('student_id')->on('students')->onUpdate('cascade');
            
            // $table->unsignedBigInteger('comment_id')->nullable();
            // $table->foreign('comment_id')
            //     ->references('id')->on('comments')
            //     ->onUpdate('cascade')->onDelete('cascade');

            $table->enum('resource_claim', ['NO','YES'])->default('NO')->nullable();

            $table->enum('library_claim', ['NO','YES'])->default('NO')->nullable();

            $table->enum('tuition_fee_status', ['PAID','UNPAID'])->default('PAID')->nullable();

            $table->enum('clearance_status', ['CLEARED','NOT CLEARED'])->default('NOT CLEARED')->nullable();

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
        Schema::dropIfExists('clearances');
    }
}
