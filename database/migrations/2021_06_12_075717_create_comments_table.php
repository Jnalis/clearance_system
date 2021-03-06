<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment_text');

            $table->string('comment_to')->nullable();
            $table->foreign('comment_to')
                ->references('student_id')
                ->on('students')
                ->onUpdate('cascade');

            $table->string('added_by')->nullable();
            $table->foreign('added_by')
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
        Schema::dropIfExists('comments');
    }
}
