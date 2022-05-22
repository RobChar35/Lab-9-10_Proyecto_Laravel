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
        Schema::create('email_password_database', function (Blueprint $table) {
            $table->id('id_database');
            $table->timestamps();
            $table->string('database_name');
        });

        Schema::create('database_information', function (Blueprint $table) {
           $table->id('id_db_information');
           $table->timestamps();
           $table->unsignedBigInteger('database_reference');
           $table->foreign('database_reference')->references('id_database')->on('email_password_database')->onDelete('cascade');
           $table->string('database_password',255);
           $table->text('database_description');
           $table->enum('encryption_type',['RSA','AES']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_password_database');
    }
};
