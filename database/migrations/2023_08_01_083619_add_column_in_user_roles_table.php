<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInUserRolesTable extends Migration
{
    public function up()
    {
        Schema::table('user_roles', function (Blueprint $table) {
            $table->boolean('is_system')->after('name')->default(0);
        });
    }

    public function down()
    {
        Schema::table('user_roles', function (Blueprint $table) {
            $table->dropColumn('is_system');
        });
    }
}
