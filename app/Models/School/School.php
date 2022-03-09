<?php
/**
 *File name : School.php  / Date: 11/1/2021 - 4:12 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Models\School;


use App\Models\Authorization\AccessRole;
use App\Models\Classes\Classes;
use App\Traits\CacheAble;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class School extends Model
{

    use HasFactory, CacheAble;

    protected $connection = KO_TEACHERS;
    protected $table = 'schools';

    protected $path_avatar = 'public/new-schools/avatar';
    protected $path_cover = 'public/new-schools/cover';
    protected $path_signature = 'public/new-schools/signature';
    protected $cover_default = 'public/new-schools/cover/default.jpg';

    protected $fillable = [
        'code',
        'name',
        'logo',
        'cover',
        'address',
        'contact_name',
        'email',
        'telephone',
        'website',
        'fax',
        'fee_omt',
        'fee_school',
        'status', //0: Inactive; 1:Active; 2:Demo; 3: Locked
        'hotline',
        'bank_account_id',
        'bank_account_name',
        'bank_info',
        'brand',
        'signature',
        'principal_id',
        'active_date',
        'locked_date',
        'logs',
        'last_update_config',
        'to_date_demo',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->cacheKey = Config::get('cache_keys.school.info');
    }

    protected $hidden = [
        'logs',
    ];

    protected $fillable_logs = ['status'];


    public function scopeActive($query)
    {
        return $query->whereIn('status', [STATUS_ACTIVE, STATUS_DEMO]);
    }

    public static function getColumnSelectAttribute()
    {
        return [
            'id',
            'code',
            'name',
            'logo',
            'cover',
            'address',
            'email',
            'telephone',
            'status',
        ];
    }

    public function classes()
    {
        return $this->hasMany(Classes::class, 'school_id')
            ->select(
                'id',
                'school_id',
                'code',
                'name',
                'logo',
                'cover',
                'album',
                'grade_id',
                'school_year_id',
                'created_user_id',
                'guardian_chief_id',
                'status', // 0: Ngừng hoạt động, 1: đang hoạt động, 2: Đã ra trường
                'offset',
                'change_status_date',
                'created_at',
                'updated_at'
            )
            ->where('status', '<>', 3)->orderBy('offset');
    }

    public function schoolYears()
    {
        return $this->hasMany(SchoolYear::class, 'school_id');
    }

    public function schoolGroups()
    {
        return $this->belongsToMany(SchoolGroup::class, 'school_group', 'school_id', 'group_id')
            ->withPivot(['created_user_id', 'modified_user_id']);
    }

    public function getSchoolGroupIds()
    {
        return $this->schoolGroups()->get()->pluck('id')->toArray();
    }

    public function accessRoles()
    {
        return $this->morphMany(AccessRole::class, 'item')->where('status', 1);
    }


}