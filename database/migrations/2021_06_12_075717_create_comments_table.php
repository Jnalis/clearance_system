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

            $table->unsignedBigInteger('comment_to')->nullable();
            $table->foreign('comment_to')
                ->references('id')->on('students')->onUpdate('cascade');

            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')
                ->references('id')->on('staff')->onUpdate('cascade');
                
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
