<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 100);
            $table->string('email', 80);
            $table->string('cpf', 50);
            $table->string('cep', 15);
            $table->string('state', 30);
            $table->string('city', 30);
            $table->string('street', 120);
            $table->string('district', 80);
            $table->string('number', 10);
            $table->string('complement', 80)->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('records');
    }
}
