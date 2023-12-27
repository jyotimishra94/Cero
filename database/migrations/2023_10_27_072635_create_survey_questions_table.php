<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('survey_questions_id')->autoIncrement();
            $table->string('name');
            $table->string('ques_type');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('survey_topics_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('survey_topics_id')->references('survey_topics_id')->on('survey_topics');
            $table->unsignedTinyInteger('status')->default(1);
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
        Schema::dropIfExists('survey_questions');
    }
};
