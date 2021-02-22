<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_rule_categories', function (Blueprint $table) {
            $table->id()->comment('Code ของ Rule Category');
            $table->string('name',255)->comment('ชื่อ Category');
            $table->text('description')->comment('ชื่อเต็ม Category');
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
        Schema::dropIfExists('kpi_rule_categories');
    }
}
