<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('quiz_question')) {
            Schema::create('quiz_question', function (Blueprint $table) {
                $table->id();
                $table->tinyInteger('moet_level');// 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
                $table->bigInteger('quiz_id');
                $table->bigInteger('question_id');
                $table->string('question_name');
                $table->string('content')->nullable();
                $table->string('solution_guide')->nullable();
                $table->tinyInteger('type')->nullable()->comment('0:Chọn 1 đáp án đúng,1:Chọn nhiều đáp án đúng');//0:Chọn 1 đáp án đúng,1:Chọn nhiều đáp án đúng
                $table->bigInteger('quiz_question_category_id')->nullable();
                $table->float('score')->nullable();//thang điểm
                $table->integer('sort_index')->nullable();
                $table->tinyInteger('status')->default(1)->comment('1 : Kích hoạt, 0 : Khóa');//1 : Kích hoạt, 0 : Khóa
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
        Schema::dropIfExists('quiz_question');
    }
}
