<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoetUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('moet_units')) {
            Schema::create('moet_units', function (Blueprint $table) {
                $table->id();
                $table->string('sis_id')->nullable();
                $table->string('code')->nullable();
                $table->string('name')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table-> integer('parent_id')->index('parent_index')->default(0);
                $table->tinyInteger('moet_level')->comment('0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường')->default(0);
                $table->tinyInteger('is_active')->comment('1 - yes; 0 - no')->default(0);
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
        Schema::dropIfExists('moet_units');
    }
}
