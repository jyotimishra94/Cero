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
        Schema::create('user_services', function (Blueprint $table) {
            $table->unsignedBigInteger('user_service_id')->autoIncrement();
            $table->string('service_name');
            $table->string('description');
            $table->string('others');
            $table->string('certifications');
            $table->string('billing_type');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedBigInteger('service_category_id');
            $table->unsignedBigInteger('sub_service_category_id');
            $table->foreign('service_category_id')->references('service_id')->on('services_category');
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
        //
    }
};
