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
        Schema::table('products', function (Blueprint $table) {
<<<<<<< HEAD
            $table->string('name');
            $table->integer('type');
=======
            $table->string('title')
                ->nullable()
                ->after('id');
            $table->json('meta')
                ->nullable()
                ->after('status');
>>>>>>> 3fbc52c (wip products)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
<<<<<<< HEAD
            $table->dropColumn(['name','type']);
=======
            $table->dropColumn('title');
            $table->dropColumn('meta');
>>>>>>> 3fbc52c (wip products)
        });
    }
};
