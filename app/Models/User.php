<?php

namespace App\Models;

use App\Helpers\DateCommonLibrary;
use App\Models\Authorization\AccessRole;
use App\Models\Classes\Classes;
use App\Traits\CacheAble;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject, CanResetPasswordContract
{

    use Authenticatable, Authorizable, HasFactory, CanResetPassword;
    use CacheAble;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'code',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'gender', // 1 male - 2 female
        'phone',
        'avatar',
        'is_active', // 1 yes - 0 no
        'status', // 1: open ; 0: locked;
        'password',
        'deleted_at',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->cacheKey = Config::get('cache_keys.users.info');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function roles()
    {
        return $this->belongsToMany(AccessRole::class, 'access_role_user', 'user_id', 'role_id')
            ->withPivot([
                'moet_unit_id',
                'created_user_id',
                'modified_user_id',
                'created_at',
                'updated_at',
            ])
            ->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('status', STATUS_ACTIVE);
    }

    public function getFullName()
    {
        $name = $this['middle_name'] == '' ? $this['last_name'].' '.$this['first_name'] :
            $this['last_name'].' '.$this['middle_name'].' '.$this['first_name'];

        return convertUnicode($name);
    }

    public function getDateOfBirthDisplayAttribute()
    {
        return DateCommonLibrary::getDisplayDate($this->date_of_birth, DISPLAY_DATE_FORMAT);
    }

}
