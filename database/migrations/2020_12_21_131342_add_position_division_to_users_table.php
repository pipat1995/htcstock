<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPositionDivisionToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('positions_id')->nullable()->after('department_id');
            $table->unsignedInteger('divisions_id')->nullable()->after('remember_token');

            $table->foreign('positions_id')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('divisions_id')->references('id')->on('divisions')->onDelete('cascade');
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
            $table->unsignedInteger('positions_id')->nullable();
            $table->unsignedInteger('divisions_id')->nullable();
        });
    }
}
