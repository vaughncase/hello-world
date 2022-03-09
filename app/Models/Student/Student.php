<?php


namespace App\Models\Student;


use App\Models\Moet\MoetUnit;
use App\Models\User;
use App\Traits\CacheAble;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Student extends Model
{

    use HasFactory, CacheAble;

//    protected $connection = KO_TEACHERS;
    protected $table = 'students';

    protected $fillable = [
        'bo_id',
        'department_id',
        'division_id',
        'school_id',
        'school_year_id',
        'grade_id',
        'homeroom_class_id',
        'user_id',
        'status',
        'deleted_at',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->cacheKey = Config::get('cache_keys.student.info');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bo()
    {
        return $this->belongsTo(MoetUnit::class, 'bo_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(MoetUnit::class, 'department_id', 'id');
    }

    public function division()
    {
        return $this->belongsTo(MoetUnit::class, 'division_id', 'id');
    }

    public function school()
    {
        return $this->belongsTo(MoetUnit::class, 'school_id', 'id');
    }

    public function school_year()
    {
        return $this->belongsTo(MoetUnit::class, 'school_id', 'id');return 1;
//        return $this->belongsTo(SchoolYear::class, 'school_year_id', 'id');
    }

    public function homeroom_class()
    {
        return $this->belongsTo(MoetUnit::class, 'school_id', 'id');return 1;
//        return $this->belongsTo(HomeroomClass::class, 'homeroom_class_id', 'id');
    }

    public function grade()
    {
        return $this->belongsTo(MoetUnit::class, 'school_id', 'id');return 1;
//        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function getStatusDisplayAttribute()
    {
        return "Đang theo học";
    }
}
