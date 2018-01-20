<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToProcedures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('procedures',function ($table){
            $table->integer('staff_category_id')->unsigned();

            $table->foreign('staff_category_id')->references('id')->on('staff_categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('procedures', function (Blueprint $table) {
            $table->dropForeign('procedures_staff_category_id_foreign');

            $table->dropColumn('staff_category_id');
        });
    }
}
