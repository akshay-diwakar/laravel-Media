<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleidToUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_roles', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('role_id');

            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::table('users_roles', function (Blueprint $table) {
            //
        });
    }
}
