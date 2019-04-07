<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id');
            $table->string('slug');
            $table->string('title');
            $table->string('matric_num');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename');
            $table->string('phone');
            $table->string('level');
            $table->string('email');
            $table->string('gender');
            $table->string('nationality');
            $table->string('marital_status');
            $table->string('date_of_birth');
            $table->string('lga');
            $table->string('state_of_origin');
            $table->string('address');
            $table->string('course_of_study');
            $table->string('admission_year');
            $table->string('expected_grad_year');
            $table->string('next_of_kin_address');
            $table->string('next_of_kin_name');
            $table->string('next_of_kin_phone');
            $table->string('sponsor_name');
            $table->string('sponsor_address');
            $table->string('sponsor_phone');
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
        Schema::dropIfExists('student_details');
    }
}
