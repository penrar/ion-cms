<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_processes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('work_process_type');
            $table->double('price');
            $table->timestamps();
        });

        Schema::create('order_work_process', function (Blueprint $table) {
            $table->unsignedInteger('work_process_id');
            $table->foreign('work_process_id')->references('id')->on('work_processes');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::drop('order_work_processes');
        Schema::drop('work_processes');
    }
}
