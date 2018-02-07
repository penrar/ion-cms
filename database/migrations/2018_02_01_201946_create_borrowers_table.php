<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('borrowerable_id');
            $table->string('borrowerable_type', 30);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('borrower_order', function(Blueprint $table) {
            $table->unsignedInteger('borrower_id');
            $table->foreign('borrower_id')->references('id')->on('borrowers');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('borrower_order');
        Schema::drop('borrowers');
    }
}
