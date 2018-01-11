<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkModuleIdToSubModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_modules',function ($table){
            $table->integer('module_id')->unsigned();
            $table->integer('sub_module_category_id')->unsigned()->nullable();

            $table->foreign('sub_module_category_id')->references('id')->on('sub_module_categories');
            $table->foreign('module_id')->references('id')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_modules', function (Blueprint $table) {
            $table->dropForeign('sub_modules_module_id_foreign');
            $table->dropForeign('sub_modules_sub_module_category_id_foreign');

            $table->dropColumn('module_id');
            $table->dropColumn('sub_module_category_id');
        });
    }
}
