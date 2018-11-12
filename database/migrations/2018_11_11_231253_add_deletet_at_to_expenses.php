<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeletetAtToExpenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('expense_categories',function ($table){
            $table->softDeletes();
            $table->dropColumn('activated');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expense_categories',function ($table){
            $table->dropColumn('deleted_at');
            $table->boolean('activated');
        });
    }
}
