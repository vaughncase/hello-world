<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('question_category')) {
            Schema::create('question_category', function (Blueprint $table) {
                $table->id();
                $table->tinyInteger('moet_level')->comment('0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường');// 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
                $table->bigInteger('moet_unit_id');// Don vi nganh doc
                $table->string('code');
                $table->string('name');
                $table->bigInteger('parent_id')->default(0);
                $table->integer('sort_index')->default(0);
                $table->tinyInteger('status')->comment('Trạng thái danh mục: 1; Kích hoạt, 0: Không kích hoạt');
                $table->bigInteger('created_user_id')->default(0);
                $table->bigInteger('modified_user_id')->default(0);
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
        Schema::dropIfExists('question_category');
    }
}
