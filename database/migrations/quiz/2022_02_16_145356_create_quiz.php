<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('quiz')) {
            Schema::create('quiz', function (Blueprint $table) {
                $table->id();
                $table->tinyInteger('moet_level');// 0 - super admin; 1 - Bộ; 2 - Sở; 3 - Phòng; 4 - trường
                $table->bigInteger('moet_unit_id');
                $table->bigInteger('lesson_id')->default(0);// id cua bai hoc
                $table->string('code');
                $table->string('name');
                $table->text('description')->nullable();
                $table->timestamp('end_date')->nullable();
                $table->integer('time')->nullable();//Lưu số phút làm bài của bài kiểm tra
                $table->float('score')->nullable();//thang điểm
                $table->integer('sort_index')->nullable();
                $table->tinyInteger('view_result')->default(0)->comment('0: Khong cho phep hoc vien xem dap an, 1: Cho phep hoc vien xem dap an sau khi lam xong');
                $table->tinyInteger('random_question')->default(0)->comment('0: Khong random cau hoi; 1: Hien thi random cau hoi');
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
        Schema::dropIfExists('quiz');
    }
}
