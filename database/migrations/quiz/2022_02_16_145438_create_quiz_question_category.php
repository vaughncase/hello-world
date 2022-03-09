<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuestionCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('quiz_question_category')) {
            Schema::create('quiz_question_category', function (Blueprint $table) {
                $table->id();
                $table->tinyInteger('moet_level');// 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
                $table->bigInteger('quiz_id');
                $table->string('name');
                $table->bigInteger('parent_id');
                $table->integer('sort_index')->default(0);
                $table->tinyInteger('status');
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
        Schema::dropIfExists('quiz_question_category');
    }
}
