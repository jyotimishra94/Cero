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
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->autoIncrement();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedBigInteger('user_type_id');
            $table->foreign('user_type_id')->references('user_type_id')->on('user_types');
            $table->string('phone')->nullable(); 
            $table->string('company')->nullable(); 
            $table->string('industry')->nullable(); 
            $table->string('location')->nullable();
            $table->string('designation')->nullable();
            $table->boolean('is_email_verified')->default(false);
            $table->unsignedTinyInteger('company_status')->default(0);
            $table->comment('1: Added Company, 2: Clients Added, 3: Products Added, 4: Services Added');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
