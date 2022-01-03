<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_photos', function (Blueprint $table) {
            $table->unsignedBigInteger('comment_id', true);
            $table->string('comment');
            $table->unsignedBigInteger('photo_id');
            $table->foreign('photo_id')->references('id')->on('user_photo');
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
        Schema::dropIfExists('comment_photos');
    }
}
