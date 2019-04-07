<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department_id');
            $table->string('session');
            $table->string('year');
            $table->string('name');
            $table->string('amount');
            $table->string('viewers');
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
        Schema::dropIfExists('deus');
    }
}
