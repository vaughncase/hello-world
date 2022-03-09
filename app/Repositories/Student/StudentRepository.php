<?php


namespace App\Repositories\Student;


use App\Models\Student\Student;
use App\Repositories\BaseRepository;

class StudentRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
        $this->list_search_fields = ['code', 'name'];
    }

    public function getModel(){
        return Student::class;
    }
}
