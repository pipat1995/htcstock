<?php

use App\Enum\ContractEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToLegalContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('legal_contracts', function (Blueprint $table) {
            $table->enum('status', [ContractEnum::R, ContractEnum::CK, ContractEnum::P, ContractEnum::CP])->after('id')->default(ContractEnum::R);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('legal_contracts', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
