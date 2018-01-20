<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions',function ($table){
            $table->integer('customer_id')->unsigned();
            $table->integer('procedure_id')->unsigned();
            $table->integer('transation_status_id')->unsigned();
            $table->integer('staff_id')->unsigned();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('procedure_id')->references('id')->on('procedures');
            $table->foreign('transation_status_id')->references('id')->on('transation_statuses');
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
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transactions_customer_id_foreign');
            $table->dropForeign('transactions_procedure_id_foreign');
            $table->dropForeign('transactions_transation_status_id_foreign');
            $table->dropForeign('transactions_staff_id_foreign');

            $table->dropColumn('customer_id');
            $table->dropColumn('procedure_id');
            $table->dropColumn('transation_status_id');
            $table->dropColumn('staff_id');
        });
    }
}
