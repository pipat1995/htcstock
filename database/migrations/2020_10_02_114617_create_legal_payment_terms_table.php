<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalPaymentTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_payment_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('payment_type_id')->nullable();
            $table->text('detail_payment_list')->nullable();
            $table->float('monthly')->nullable();
            $table->float('route_change')->nullable();
            $table->float('payment_ot')->nullable();
            $table->float('holiday_pay')->nullable();
            $table->float('ot_driver')->nullable();
            $table->string('other_expense')->nullable();
            $table->float('price_of_service')->nullable();
            $table->text('detail_payment_term')->nullable();
            $table->timestamps();

            $table->foreign('payment_type_id')->references('id')->on('legal_payment_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_payment_terms');
    }
}
