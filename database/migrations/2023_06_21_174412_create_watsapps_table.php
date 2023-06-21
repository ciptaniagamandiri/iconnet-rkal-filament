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
        Schema::create('whatsapps', function (Blueprint $table) {
            $table->id();
            $table->string('credential');
            $table->enum('type', ['number', 'group']);
            $table->boolean('receive_message')->default(0);
            $table->string('label');
            $table->timestamps();
        });

        Schema::create('whatsapp_otp', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('token');
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('whatsapps');
        Schema::dropIfExists('whatsapp_otp');
    }
};
