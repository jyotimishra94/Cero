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
        Schema::create('survey_user_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('survey_users_answers_id')->autoIncrement();
            $table->string('ans_name');
            $table->string('ques_name');
            $table->boolean('is_correct')->default(false); 
            $table->unsignedBigInteger('survey_questions_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('survey_questions_id')->references('survey_questions_id')->on('survey_questions');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedBigInteger('survey_topics_id');
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
        Schema::dropIfExists('survey_user_answers');
    }
};
