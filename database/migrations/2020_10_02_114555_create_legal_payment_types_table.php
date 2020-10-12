<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalPaymentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_payment_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('agreement_id')->nullable();

            $table->foreign('agreement_id')->references('id')->on('legal_agreements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_payment_types');
    }
}
