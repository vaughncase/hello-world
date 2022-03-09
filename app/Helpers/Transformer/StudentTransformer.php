<?php


namespace App\Helpers\Transformer;


class StudentTransformer extends \Transformer
{
    public function transform($item)
    {
        return $item;
    }

    public function transformCollectStudents($students)
    {
        return $students->map(function($student) {
            return [
                'sis_id' => !empty($student->user) ? $student->user->sis_id : "",
                'fullname' => !empty($student->user) ? $student->user->getFullName() : "",
                'dob' => !empty($student->user) ? $student->user->date_of_birth_display : "",
                'homeroom_class_id' => $student->homeroom_class_id,
                'homeroom_class_name' => '',
                'grade_id' => $student->grade_id,
                'grade_name' => '',
                'department_id' => 0,
                'department_name' => '',
                'division_id' => 0,
                'division_name' => '',
                'school_id' => 0,
                'school_name' => '',
                'status' => $student->status,
                'status_name' => $student->status_display,
            ];
        })->toArray();
    }
}
