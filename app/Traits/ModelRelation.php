<?php


namespace App\Traits;


use App\Models\Classes\Classes;
use App\Models\School\School;
use App\Models\Student\Student;
use App\Models\User;

trait ModelRelation
{

    public function createdUser()
    {
        return $this->hasOne(User::class, 'id', 'created_user_id')->active();
    }

    public function modifiedUser()
    {
        return $this->hasOne(User::class, 'id', 'modified_user_id')->active();
    }

    public function acceptedUser()
    {
        return $this->hasOne(User::class, 'id', 'accepted_user_id')->active();
    }

    public function classes()
    {
        return $this->hasOne(Classes::class, 'id', 'class_id')->active();
    }

    public function school()
    {
        return $this->hasOne(School::class, 'id', 'school_id')->active();
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id')->active();
    }
}