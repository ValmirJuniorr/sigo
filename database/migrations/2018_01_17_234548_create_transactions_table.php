<?php

use App\Models\Contracts\ModelContract;
use App\Models\Contracts\TransactionContract;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TransactionContract::TABLE_NAME, function (Blueprint $table) {
            $table->increments(ModelContract::COLUMN_ID);
            $table->float(TransactionContract::COLUMN_PRICE);
            $table->boolean(TransactionContract::COLUMN_PAID);
            $table->string(TransactionContract::COLUMN_DESCRIPTION);
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
        Schema::dropIfExists(TransactionContract::TABLE_NAME);
    }
}
