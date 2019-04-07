<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumniDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id');
            $table->string('slug');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->string('email');
            $table->string('matric_num');
            $table->string('course_of_study');
            $table->string('admission_year');
            $table->string('grad_year');
            $table->string('next_of_kin_name');
            $table->string('next_of_kin_phone');
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
        Schema::dropIfExists('alumni_details');
    }
}
