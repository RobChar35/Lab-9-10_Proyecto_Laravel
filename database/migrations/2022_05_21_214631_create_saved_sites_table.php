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
        Schema::create('saved_sites', function (Blueprint $table) {
            $table->id('id_ssite');
            $table->timestamps();
            $table->string('username',100);
            $table->string('ssite_email',255);
            $table->string('ssite_password',255);
            $table->string('ssite_link',300);
            $table->text('ssite_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved_sites');
    }
};
