<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            // $table->string('tostart');
            $table->string('deadline');
            $table->string('cand1');
            $table->string('cand2');
            $table->string('cand3')->nullable();
            $table->string('cand4')->nullable();
            $table->integer('closed');
            $table->integer('started');
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
        Schema::dropIfExists('polls');
    }
}
