<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('question_answers')) {
            Schema::create('question_answers', function (Blueprint $table) {
                $table->id();
                $table->tinyInteger('moet_level');// 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
                $table->bigInteger('question_id');
                $table->string('content');
                $table->tinyInteger('is_true')->comment('0: Câu trả lời sai, 1: Câu trả lời đúng');//0: Câu trả lời sai, 1: Câu trả lời đúng
                $table->float('percent_score')->comment('Phần trăm điểm cho câu trả lời');//Phần trăm điểm cho câu trả lời
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
        Schema::dropIfExists('question_answers');
    }
}
