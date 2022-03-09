<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('access_permissions')) {
            Schema::create('access_permissions', function(Blueprint $table) {
                $table->increments('id');
                $table->string('code')->nullable()->comment('Mã code định danh quyền hạn');
                $table->string('name');
                $table->text('description')->nullable();
                $table->integer('created_user_id')->index();
                $table->integer('modified_user_id')->index()->nullable();
                $table->softDeletes();
                $table->timestamps();
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
        Schema::dropIfExists('access_permissions');
    }
}
