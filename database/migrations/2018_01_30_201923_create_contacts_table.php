<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \Illuminate\Database\Eloquent\SoftDeletes;

class CreateContactsTable extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 70);
            $table->string('last_name', 70);
            $table->string('phone_number', 12);
            $table->string('address1', 80);
            $table->string('address2', 80)->nullable();
            $table->string('city', 50);
            $table->string('state', 30);
            $table->string('zip_code', 10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }
}
