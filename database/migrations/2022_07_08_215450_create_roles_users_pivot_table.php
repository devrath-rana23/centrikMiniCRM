<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesUsersPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_users_pivot', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->comment('Relation with users  table id');
            $table->integer('role_id')->unsigned()->comment('Relation with roles table id');
            $table->integer('created_at')->unsigned();
            $table->integer('updated_at')->unsigned();
            $table->integer('deleted_at')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_users_pivot');
    }
}
