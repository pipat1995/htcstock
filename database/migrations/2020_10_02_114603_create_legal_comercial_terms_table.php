<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalComercialTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_comercial_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('scope_of_work')->nullable();
            $table->string('location')->nullable();
            $table->string('purchase_order_no')->nullable();
            $table->string('quotation_no')->nullable();
            $table->dateTime('dated')->nullable();
            $table->dateTime('contract_period')->nullable();
            $table->dateTime('untill')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->string('to_manufacture')->nullable();
            $table->string('of')->nullable();
            $table->string('working_day')->nullable();
            $table->string('working_time')->nullable();
            $table->integer('number_of_cook')->nullable();
            $table->float('comercial_ot')->nullable();
            $table->integer('number_of_doctor')->nullable();
            $table->integer('number_of_sercurity_guard')->nullable();
            $table->integer('number_of_subcontractor')->nullable();
            $table->integer('number_of_agent')->nullable();
            $table->string('route')->nullable();
            $table->string('to')->nullable();
            $table->float('dry_container_size')->nullable();
            $table->integer('the_number_of_truck')->nullable();
            $table->string('purpose')->nullable();
            $table->string('promote_a_product')->nullable();
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
        Schema::dropIfExists('legal_comercial_terms');
    }
}
