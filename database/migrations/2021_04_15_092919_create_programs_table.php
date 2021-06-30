<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('prog_name');
            $table->string('prog_code')->unique();

            $table->string('added_by')->nullable();
            $table->string('dept_code')->nullable();

            $table->foreign('added_by')
                ->references('username')
                ->on('staff')
                ->onUpdate('cascade');

            $table->foreign('dept_code')
                ->references('dept_code')
                ->on('departments')
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
        Schema::dropIfExists('programs');
    }
}
