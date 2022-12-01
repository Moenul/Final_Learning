<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comment_id');
            $table->integer('is_active')->default(0);
            $table->string('author');
            $table->string('photo');
            $table->string('email');
            $table->text('body');
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
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

        Schema::table('comment_replies', function (Blueprint $table) {
            $table->unsignedBigInteger('comment_id');

            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }
}
