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
        Schema::create('category', function (Blueprint $table) {
            $table->id('id_category');
            $table->timestamps();
            $table->string('category_name',100);
        });

        Schema::create('sub_category', function (Blueprint $table){
            $table->id('id_subcategory');
            $table->timestamps();
            $table->string('subcategory_name',100);
            $table->unsignedBigInteger('category_reference');
            $table->foreign('category_reference')->references('id_category')->on('category')->onDelete('cascade');
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
