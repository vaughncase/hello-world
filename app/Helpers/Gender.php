<?php
/**
 *File name : Gender.php  / Date: 11/2/2021 - 2:29 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Helpers;


use Illuminate\Support\Str;

class Gender
{

    public $male = USER_GENDER_MALE;
    public $female = USER_GENDER_FEMALE;
    public $undefined = USER_GENDER_UNDEFINED;
    protected $gender;

    public function __construct($gender)
    {
        $this->gender = $gender;
    }

    public static function get($gender)
    {
        return (new static($gender))->process();
    }

    public static function getText($gender)
    {
        return (new static($gender))->processText();
    }

    public static function getInt($gender)
    {
        return (new static($gender))->processInt();
    }

    public static function getLabelAndColor($gender)
    {
        return (new static($gender))->processLabelAndColor();
    }

    public static function form($gender)
    {
        return (new static($gender))->format();
    }

    private function process()
    {
        return collect([
            'male'           => 'male',
            'nam'            => 'male',
            'female'         => 'female',
            'nữ'             => 'female',
            $this->male      => 'male',
            $this->female    => 'female',
            $this->undefined => 'undefined',
        ])->get(Str::lower($this->gender), 'undefined');
    }

    private function processText()
    {
        return collect([
            'male'           => trans('general.male'),
            'nam'            => trans('general.male'),
            'female'         => trans('general.female'),
            'nữ'             => trans('general.female'),
            $this->male      => trans('general.male'),
            $this->female    => trans('general.female'),
            $this->undefined => trans('general.other'),
        ])->get(Str::lower($this->gender), trans('general.other'));
    }

    private function processInt()
    {
        return collect([
            'male'           => (int)1,
            'nam'            => (int)1,
            'female'         => (int)0,
            'nữ'             => (int)0,
            $this->male      => (int)1,
            $this->female    => (int)0,
            $this->undefined => (int)2,
        ])->get(Str::lower($this->gender), (int)2);
    }

    private function processLabelAndColor()
    {
        return collect([
            'male'           => $this->handleMale(),
            'nam'            => $this->handleMale(),
            'female'         => $this->handleFeMale(),
            'nữ'             => $this->handleFeMale(),
            $this->male      => $this->handleMale(),
            $this->female    => $this->handleFeMale(),
            $this->undefined => $this->handleUndefined(),
        ])->get(Str::lower($this->gender), $this->handleUndefined());
    }

    public function handleFemale()
    {
        return [
            'label' => trans('general.female'),
            'color' => 'kt-font-pink',
            'icon'  => 'fa fa-venus',
        ];
    }

    public function handleMale()
    {
        return [
            'label' => trans('general.male'),
            'color' => 'kt-font-info',
            'icon'  => 'fa fa-mars',
        ];
    }

    public function handleUndefined()
    {
        return [
            'label' => trans('general.other'),
            'color' => 'kt-font-dark',
            'icon'  => 'fa fa-genderless',
        ];
    }

    private function format()
    {
        return 'this is formatted gender';
    }
}