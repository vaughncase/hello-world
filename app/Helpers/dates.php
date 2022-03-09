<?php

use App\Helpers\DateCommonLibrary;
use App\Models\School\School;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

/**
 *File name : dates.php  / Date: 11/18/2021 - 10:17 AM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */


function formatDate()
{
    return [
        'd-m-Y',
        'd/m/Y',
        'Y-m-d',
        'Y/m/d',
        'H:i d-m-Y',
        'H:i d/m/Y',
        'H:i Y-m-d',
        'H:i Y/m/d',
        'd-m-Y H:i',
        'd/m/Y H:i',
        'Y-m-d H:i',
        'Y/m/d H:i',
        'Y-m-d H:i:s',
        'Y/m/d H:i:s',
        'H:i:s',
        'H:i'
    ];
}

function validateDate($date)
{
    $formats = formatDate();

    foreach ($formats as $format) {
        $d = DateTime::createFromFormat($format, $date);
        if ($d) {
            return $d->format($format) == $date;
        }
    }

    return false;
}

function validateDateEndFormat($date)
{
    $formats = formatDate();

    foreach ($formats as $format) {
        $d = DateTime::createFromFormat($format, $date);
        if ($d) {

            return $d->format($format) == $date ? Carbon::parse($d) : false;
        }
    }

    return false;
}

function countDateBySchool(School $school, $fromDate, $toDate)
{
    $countDate   = countDate($fromDate, $toDate);
    $countDayOff = countDayOffBySchool($school, $fromDate, $toDate, true);

    return $countDate > $countDayOff ? $countDate - $countDayOff : (int)0;
}

function countDayOffBySchool(School $school, $fromDate, $toDate, $getCount = false)
{
    $fromDate = Carbon::parse($fromDate);
    $toDate   = Carbon::parse($toDate);
    $dateList = DateCommonLibrary::getSchoolDateRange($school, $fromDate, $toDate);

    return $getCount ? collect($dateList)->filter(function ($dateItem) {
        return $dateItem['day_off'];
    })->count() : $dateList;
}

function countDate($fromDate, $toDate)
{
    return Carbon::parse($toDate)->diffInDays(Carbon::parse($fromDate)) + 1;
}

function formatDayToDate($date, $horizontal = true)
{
    return $horizontal ? Carbon::parse($date)->format('d-m-Y') : Carbon::parse($date)->format('d/m/Y');
}

function formatDayToTime($date)
{
    return Carbon::parse($date)->format('H:i');
}

function formatDayToDateTime($date, $horizontal = true)
{
    return $horizontal ? Carbon::parse($date)->format('H:i d-m-Y') : Carbon::parse($date)->format('H:i d/m/Y');
}

function formatDayToTimestamp($date, $check = false)
{
    return validateDate($date) || $check ? Carbon::parse($date)->timestamp : 0;
}

function convertTimestampToDate($date)
{
    try {
        $date = Carbon::createFromTimestamp($date)->toDateString();
        $date = Carbon::parse($date);
    } catch (Exception $exception) {
        return false;
    }

    return $date;
}

function convertTimestampToDateTimeString($date)
{
    $date = Carbon::createFromTimestamp($date)->toDateTimeString();
    $date = Carbon::parse($date);

    return $date;
}

function convertTimestampToTime($date)
{
    try {
        $time = !$date ? null : Carbon::createFromTimestamp($date)->toTimeString();

    } catch (Exception $exception) {
        return false;
    }

    return $time;
}


function changeTimeFromTimezoneAndServer(Carbon $time, $schoolId, $forApp = false)
{
    $timezoneOffset = getTimezoneOffsetOfSchool($schoolId);

    if (env('APP_GLOBAL')) {
        return $forApp ? $time->addHours(0 - (int)$timezoneOffset) : $time->copy()->addHours((integer)$timezoneOffset);
    }

    // for komt server
    return $forApp ? $time->addHours(7 - (int)$timezoneOffset) : $time->copy()->addHours((integer)$timezoneOffset - 7);
}

function getTimezoneOfSchool($schoolId)
{
    $cacheKey = 'timezone-school-' . $schoolId;
    $timezone = Cache::get($cacheKey);
    if (is_null($timezone)) {
        $school   = School::whereId($schoolId)->select('id', 'timezone')->first();
        $timezone = !is_null($school) && !is_null($school->timezone) ? $school->timezone : 'Asia/Bangkok';
        Cache::put($cacheKey, $timezone, 120);
    }

    return $timezone;
}

function getTimezoneOffsetOfSchool($schoolId)
{
    $timezone = getTimezoneOfSchool($schoolId);
    $time     = new \DateTime('now', new DateTimeZone($timezone));

    return (integer)$time->format('P');
}

function setTimezoneOfSchool($schoolId)
{
    $timezone = getTimezoneOfSchool($schoolId);
    date_default_timezone_set($timezone);
}

function convertDayOfWeekToShortText($dayOfWeek)
{
    return collect([
        0 => "CN",
        1 => "T2",
        2 => "T3",
        3 => "T4",
        4 => "T5",
        5 => "T6",
        6 => "T7",
    ])->get($dayOfWeek, "");
}

function convertDayOfWeekToText($dayOfWeek)
{
    return collect([
        0 => "Chủ nhật",
        1 => "Thứ 2",
        2 => "Thứ 3",
        3 => "Thứ4",
        4 => "Thứ 5",
        5 => "Thứ 6",
        6 => "Thứ 7",
    ])->get($dayOfWeek, "");
}