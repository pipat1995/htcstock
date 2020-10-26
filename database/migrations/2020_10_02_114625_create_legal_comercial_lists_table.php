<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalComercialListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_comercial_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable();
            $table->float('unit_price')->nullable();
            $table->float('discount')->nullable();
            $table->float('amount')->nullable();

            $table->integer('road')->nullable();
            $table->integer('building')->nullable();
            $table->integer('toilet')->nullable();
            $table->integer('canteen')->nullable();
            $table->integer('washing')->nullable();
            $table->integer('water')->nullable();
            $table->integer('mowing')->nullable();
            $table->integer('general')->nullable();
            $table->unsignedInteger('contract_dests_id');
            $table->timestamps();

            $table->foreign('contract_dests_id')->references('id')->on('legal_contract_dests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_comercial_lists');
    }
}
