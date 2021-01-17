<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employe_id');
            $table->string('name');
            $table->unsignedBigInteger('department_id');
            $table->string('designation');
            $table->string('status');
            $table->unsignedBigInteger('blood_id');
            $table->timestamps();

            $table->foreign('department_id')
                ->references('id')
                ->on('department')
                ->onDelete('cascade');

            $table->foreign('blood_id')
                ->references('id')
                ->on('blood')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
