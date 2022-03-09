<?php


namespace App\Http\Controllers\Student;


use App\Helpers\Transformer\StudentTransformer;
use App\Http\Controllers\Controller;
use App\Repositories\Student\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $student_repository;
    private $student_transformer;

    public function __construct()
    {
        parent::__construct();
        $this->student_repository = new StudentRepository();
        $this->student_transformer = new StudentTransformer();
    }

    public function index(Request $request)
    {
        $data = $this->data;
        $filter_by_keys = $data['filter'] ?? [];
        $parameters = [];
        $db_students = $this->student_repository->getData($parameters, ['user', 'bo', 'department', 'division', 'homeroom_class', 'grade']);
        return $this->student_transformer->transformCollectStudents($db_students);
    }
}
