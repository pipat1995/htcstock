<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_target_units', function (Blueprint $table) {
            $table->string('code',50)->unique()->comment('Code ของจำนวนนับของเป้าหมาย');
            $table->string('name',255)->comment('จำนวนนับของเป้าหมาย เช่น % , Day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpi_target_units');
    }
}
