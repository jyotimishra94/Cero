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
        Schema::create('client_experience', function (Blueprint $table) {
            $table->unsignedBigInteger('client_experience_id')->autoIncrement();
            $table->string('client_name');
            $table->string('project_title');
            $table->text('description');
            $table->string('highlights');
            $table->float('project_size'); 
            $table->string('project_size_currency'); 
            $table->integer('project_duration_in_month');
            $table->integer('project_duration_in_year');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('company_id')->on('companies');
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
        Schema::dropIfExists('client_experience');
    }
};
