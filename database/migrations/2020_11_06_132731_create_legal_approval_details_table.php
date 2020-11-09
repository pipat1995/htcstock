<?php

use App\Enum\ApprovalEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalApprovalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_approval_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('contract_id');
            $table->unsignedInteger('user_id');
            $table->integer('levels');
            $table->enum('status', [ApprovalEnum::A, ApprovalEnum::R])->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('contract_id')->references('id')->on('legal_contracts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_approval_details');
    }
}
