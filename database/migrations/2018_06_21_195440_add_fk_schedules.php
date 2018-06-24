<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedules',function ($table){
            $table->integer('office_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('staff_id')->unsigned();
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('staff_id')->references('id')->on('staff');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign('schedules_office_id_foreign');
            $table->dropForeign('schedules_customer_id_foreign');
            $table->dropForeign('schedules_staff_id_foreign');
            $table->dropColumn('customer_id');
            $table->dropColumn('staff_id');
            $table->dropColumn('office_id');

        });
    }
}


