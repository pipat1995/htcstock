<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_contracts', function (Blueprint $table) {
            // header
            $table->increments('id');
            $table->unsignedInteger('action_id');
            $table->unsignedInteger('agreement_id');
            $table->string('company_name')->nullable();
            $table->longText('company_cer')->nullable();
            $table->string('representative')->nullable();
            $table->longText('representative_cer')->nullable();
            $table->text('address')->nullable();
            // body
            $table->unsignedInteger('contract_dest_id')->nullable();
            // footer
            $table->unsignedInteger('requestor_by')->nullable();
            $table->unsignedInteger('checked_by')->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();

            $table->foreign('action_id')->references('id')->on('legal_actions')->onDelete('cascade');
            $table->foreign('agreement_id')->references('id')->on('legal_agreements')->onDelete('cascade');
            $table->foreign('contract_dest_id')->references('id')->on('legal_contract_dests')->onDelete('cascade');
            $table->foreign('requestor_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('checked_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_contracts');
    }
}
