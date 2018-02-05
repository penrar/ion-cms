<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 120);
            $table->string('phone_number', 12);
            $table->string('address1', 80);
            $table->string('address2', 80)->nullable();
            $table->string('city', 50);
            $table->string('state', 30);
            $table->string('zip_code', 10);
            $table->unsignedInteger('contact_id');
            $table->foreign('contact_id')->references('id')->on('contacts');
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
        Schema::drop('companies');
    }
}
