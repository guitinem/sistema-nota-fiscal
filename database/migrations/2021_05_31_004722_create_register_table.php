<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 100);
            $table->string('email', 80);
            $table->string('cpf', 50);
            $table->string('cep', 15);
            $table->string('state', 30);
            $table->string('city', 30);
            $table->string('address', 120);
            $table->string('district', 80);
            $table->string('number', 10);
            $table->string('complement', 80);
            $table->boolean('status');
            $table->string('invoice', 150);
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
        Schema::dropIfExists('register');
    }
}
