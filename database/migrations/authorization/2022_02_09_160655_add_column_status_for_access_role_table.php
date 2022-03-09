<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStatusForAccessRoleTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('access_roles', ['status'])) {
            Schema::table('access_roles', function(Blueprint $table) {
                $table->tinyInteger('status')->index()->comment('0: DeActive, 1: Active');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('access_roles', ['status']);
    }

}
