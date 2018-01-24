<?php

use App\Models\Contracts\StaffContract;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(StaffContract::TABLE_NAME, function (Blueprint $table) {
            $table->increments(ModelContract::COLUMN_ID);
            $table->string(StaffContract::COLUMN_NAME);
            $table->string(StaffContract::COLUMN_DOCUMENT);
            $table->string(StaffContract::COLUMN_UF);
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
        Schema::dropIfExists(StaffContract::TABLE_NAME);
    }
}
