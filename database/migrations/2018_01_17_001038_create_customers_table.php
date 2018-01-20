<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('cell_phone');
            $table->string('email');
            $table->string('birth_date');
            $table->string('city');
            $table->string('neighborhood');
            $table->string('cep');
            $table->string('uf');
            $table->boolean('gender');
            $table->string('cpf')->unique();
            $table->string('rg')->unique();
            $table->boolean('activated')->default(true);
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
        Schema::dropIfExists('customers');
    }
}
