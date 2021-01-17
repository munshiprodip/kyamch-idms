<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_card', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product');
            $table->unsignedBigInteger('employee_id');
            $table->bigInteger('quentity');
            $table->integar('consumption_type');
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
        Schema::dropIfExists('access_card');
    }
}
