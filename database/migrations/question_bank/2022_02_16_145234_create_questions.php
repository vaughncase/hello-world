<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('questions')) {
            Schema::create('questions', function (Blueprint $table) {
                $table->id();
                $table->tinyInteger('moet_level');
                $table->bigInteger('question_category_id');
                $table->string('code');
                $table->string('name');
                $table->string('content')->nullable();
                $table->string('solution_guide')->nullable();
                $table->tinyInteger('type')->comment('0:Chọn 1 đáp án đúng,1:Chọn nhiều đáp án đúng');
                $table->tinyInteger('status')->default(1)->comment('1 : Kích hoạt, 0 : Khóa');
                $table->tinyInteger('is_private')->default(0)->comment('1 : của cá nhân, 0 : của tổ chức');
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
        Schema::dropIfExists('questions');
    }
}
