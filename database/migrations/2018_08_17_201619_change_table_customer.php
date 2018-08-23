<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTableCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers',function ($table){
            $table->string('address')->nullable()->change();
            $table->string('birth_date')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('cep')->nullable()->change();
            $table->boolean('gender')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers',function ($table){

        });
    }
}
