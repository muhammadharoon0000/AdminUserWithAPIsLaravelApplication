<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolePermissionsTable extends Migration
{
    public function up()
    {
        Schema::create('user_role_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('premission');
            $table->unsignedBigInteger('user_role');
            $table->foreign('premission')->references('id')->on('permissions');
            $table->foreign('user_role')->references('id')->on('user_roles');
        });
    }
    public function down()
    {
        Schema::dropIfExists('user_role_permissions');
    }
}
