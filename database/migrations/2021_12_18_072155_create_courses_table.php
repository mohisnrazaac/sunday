<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->string("title");
            $table->text("description");
            $table->text("course_short_desc");
            $table->text("learning_purpose");
            $table->text("requirements");
            $table->enum('course_level', ['Beginner', 'Intermediate', 'Expert']);
            $table->integer('audio_lang');
            $table->integer('caption_lang');
            $table->string("image");
            $table->boolean('is_published')->default(0);
            $table->boolean('require_login')->default(0);
            $table->boolean('require_enroll')->default(0);
            $table->integer('regular_price');
            $table->integer('discount_price');
            $table->unsignedBigInteger('ver_id');
            $table->softDeletes();
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
        Schema::dropIfExists('courses');
    }
}
