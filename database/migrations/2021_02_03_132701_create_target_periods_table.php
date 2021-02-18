<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_target_periods', function (Blueprint $table) {
            $table->id()->comment('Code ของ ช่วงเวลาการประเมิน');
            $table->string('name',255)->comment('ช่วงเวลาการประเมิน เช่น Annual,Jan,Feb,Mar,Q1,');
            $table->string('year',4)->comment('ปี ของ ช่วงเวลาการประเมิน');
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
        Schema::dropIfExists('kpi_target_periods');
    }
}
