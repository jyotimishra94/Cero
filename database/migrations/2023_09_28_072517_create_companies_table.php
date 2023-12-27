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
        Schema::create('companies', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->autoIncrement();
            $table->string('company_name');
            $table->string('team_size');
            $table->string('logo'); 
            $table->string('official_website');
            $table->string('pan_number');
            $table->string('pan_number_image');
            $table->string('gst_number');
            $table->integer('experience_in_month');
            $table->integer('experience_in_year');
            $table->string('specialization');
            $table->float('min_project_amount'); 
            $table->string('min_project_currency'); 
            $table->float('max_project_amount'); 
            $table->string('max_project_currency'); 
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
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
        Schema::dropIfExists('companies');
    }
};
