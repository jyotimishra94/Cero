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
        //
        Schema::create('user_products', function (Blueprint $table) {
            $table->unsignedBigInteger('user_product_id')->autoIncrement();
            $table->string('product_name');
            $table->text('description');
            $table->string('others');
            $table->string('certifications');
            $table->decimal('tentative_cost', 10, 2)->nullable();
            $table->string('currency'); 
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('sub_product_category_id');
            $table->foreign('product_category_id')->references('product_id')->on('products_category');
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
