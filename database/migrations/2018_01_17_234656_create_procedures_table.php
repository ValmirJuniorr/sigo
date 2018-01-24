<?php

use App\Models\Contracts\ProcedureContract;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ProcedureContract::TABLE_NAME, function (Blueprint $table) {
            $table->increments(ModelContract::COLUMN_ID);
            $table->string(ProcedureContract::COLUMN_NAME);
            $table->time(ProcedureContract::COLUMN_PROCEDURE_TIME);
            $table->boolean(ModelContract::COLUMN_ACTIVATED)->default(true);
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
        Schema::dropIfExists(ProcedureContract::TABLE_NAM);
    }
}
