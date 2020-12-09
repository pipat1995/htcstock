<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersHasSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_has_systems', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('system_id');

            //FOREIGN KEY CONSTRAINTS
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('system_id')->references('id')->on('system')->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['user_id', 'system_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_has_systems');
    }
}
