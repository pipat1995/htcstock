<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameEnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name_en', 255)->nullable()->comment('ชื่อภาษาอังกฤษ')->after('name');
            $table->integer('head_id')->nullable()->comment('id หัวหน้า')->after('id');
            $table->string('incentive_type', 255)->nullable()->comment('ประเภทแรงจูงใจ Quarter หรือ Month')->after('locale');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'head_id', 'incentive_type']);
        });
    }
}
