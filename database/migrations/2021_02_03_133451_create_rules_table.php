<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_rules', function (Blueprint $table) {
            $table->id()->comment('id rule');
            $table->string('name',255)->comment('ชื่อ Rule');
            $table->string('category_code',50)->nullable();
            $table->foreign('category_code')->references('code')->on('kpi_rule_categories')->comment('Code ของ rule_categories');
            $table->string('description',255)->nullable()->comment('คำอธิบาย');
            $table->string('measurement',255)->nullable()->comment('การวัดผล <= หรือ >=');
            $table->string('target_unit_code',50)->nullable();
            $table->foreign('target_unit_code')->nullable()->references('code')->on('kpi_target_units')->comment('Code ของ target_units');
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
        Schema::dropIfExists('kpi_rules');
    }
}
