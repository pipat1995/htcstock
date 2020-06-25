<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('access_id');
            $table->integer('qty');
            $table->integer('trans_type');
            $table->integer('trans_by');
            $table->string('trans_desc')->nullable();
            $table->string('ir_no')->nullable();
            $table->string('po_no')->nullable();
            $table->string('invoice_no')->nullable();
            $table->double('unit_cost')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('ref_no')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
