<?php
/**
 *File name : DateCommonLibrary.php  / Date: 11/2/2021 - 2:13 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Helpers;


use App\Repositories\Config\HolidayRepository;
use App\Repositories\Config\SchoolConfigRepository;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Object_;

class DateCommonLibrary
{

    /**
     * Lấy các ngày đi học trong tuần của lớp
     * @param $schoolId
     * @param Carbon $date
     * @return \Illuminate\Support\Collection
     */
    public function getDaysInWeek($schoolId, Carbon $date)
    {
        // make days of week
        $daysOff     = self::getDaysOffOfSchool($schoolId);
        $dates       = collect();
        $startOfWeek = $date->copy()->startOfWeek();
        $endOfWeek   = $date->copy()->endOfWeek();
        while ($startOfWeek < $endOfWeek) {
            if (!in_array($startOfWeek->dayOfWeek, $daysOff)) {
                $date_element       = new Object_();
                $date_element->date = $startOfWeek->copy();
                $dates->push($date_element);
            }
            $startOfWeek->addDay();
        }

        return $dates;
    }

    /**
     * Lấy mảng danh sách các ngày đi học của một trường
     * @param $schoolId
     * @param Carbon $fromDate
     * @param Carbon $toDate
     * @param bool $withDayOff
     * @return array
     */
    public static function getSchoolDateRange($schoolId, Carbon $fromDate, Carbon $toDate, $withDayOff = true)
    {
        $range        = array();
        $dayOff       = array();
        $holidayDates = array();
        if ($withDayOff) {
            $dayOff       = self::getDaysOffOfSchool($schoolId);
            $holidayDates = self::getHolidayDatesOfSchool($schoolId, $fromDate, $toDate);
        }

        $iDateFrom = self::makeTimeFromDateString($fromDate);
        $iDateTo   = self::makeTimeFromDateString($toDate);
        if ($iDateTo >= $iDateFrom) {
            $range = self::checkDayOffThenPushDateToArray($range, $iDateFrom, $dayOff, $holidayDates);
            while ($iDateFrom < $iDateTo) {
                $iDateFrom += 86400; // add 24 hours
                $range     = self::checkDayOffThenPushDateToArray($range, $iDateFrom, $dayOff, $holidayDates);
            }
        }

        return $range;
    }

    /**
     * Lấy mảng các ngày
     * @param Carbon $fromDate
     * @param Carbon $toDate
     * @return array|mixed
     */
    public static function getDateRange(Carbon $fromDate, Carbon $toDate)
    {
        $range        = array();
        $dayOff       = array();
        $holidayDates = array();

        $iDateFrom = self::makeTimeFromDateString($fromDate);
        $iDateTo   = self::makeTimeFromDateString($toDate);
        if ($iDateTo >= $iDateFrom) {
            $range = self::checkDayOffThenPushDateToArray($range, $iDateFrom, $dayOff, $holidayDates);
            while ($iDateFrom < $iDateTo) {
                $iDateFrom += 86400; // add 24 hours
                $range     = self::checkDayOffThenPushDateToArray($range, $iDateFrom, $dayOff, $holidayDates);
            }
        }

        return $range;
    }

    public static function getHolidayDatesOfSchool($schoolId, Carbon $fromDate, Carbon $toDate)
    {
        $holidayDates = (new HolidayRepository())->querySchoolHolidayDateByDateRang($schoolId, $fromDate, $toDate);

        return count($holidayDates) > 0 ? $holidayDates->pluck('date')->all() : array();
    }

    /**
     * @param $range
     * @param $date
     * @param $isDayOff
     * @return mixed
     */
    private static function pushDateToArray($range, $date, $isDayOff)
    {
        array_push($range,
            [
                "date"            => date('Y-m-d', $date),
                "day_of_week"     => date('w', $date),
                'day_off'         => $isDayOff,
                'date_label'      => date('d-m-Y', $date),
                'date_label_sort' => date('d/m', $date),
                'label'           => self::getDayLabelFromDayOfWeek(date('w', $date))
            ]);

        return $range;
    }

    /**
     * @param Carbon $date
     * @return false|int
     */
    private static function makeTimeFromDateString(Carbon $date)
    {
        $date = mktime(1, 0, 0,
            substr($date, 5, 2),
            substr($date, 8, 2),
            substr($date, 0, 4));

        return $date;
    }

    /**
     * @param $range
     * @param $date
     * @param $dayOff
     * @param $holidayDates
     * @return mixed
     */
    private static function checkDayOffThenPushDateToArray($range, $date, $dayOff, $holidayDates)
    {
        $dateOfWeek   = array_map('intval', explode(',', date('w', $date)));
        $dayOff       = is_array($dayOff) ? $dayOff : array_map('intval', explode(',', $dayOff));
        $holidayDates = is_array($holidayDates) ? $holidayDates : array_map('intval', explode(',', $holidayDates));

        $isDayOff = !in_array($dateOfWeek, $dayOff) ? 0 : 1;
        if ($isDayOff == 0 && count($holidayDates) > 0) {
            $isDayOff = in_array(Carbon::createFromTimestamp($date)->format('Y-m-d'), $holidayDates) ? 1 : 0;
        }
        $range = self::pushDateToArray($range, $date, $isDayOff);

        return $range;
    }

    public static function getDayLabelFromDayOfWeek($dayOfWeek)
    {
        switch ($dayOfWeek) {
            case 0:
                $label = trans('date.dayOfWeek.sunday');
                break;
            case 1:
                $label = trans('date.dayOfWeek.monday');
                break;
            case 2:
                $label = trans('date.dayOfWeek.tuesday');
                break;
            case 3:
                $label = trans('date.dayOfWeek.wednesday');
                break;
            case 4:
                $label = trans('date.dayOfWeek.thursday');
                break;
            case 5:
                $label = trans('date.dayOfWeek.friday');
                break;
            case 6:
                $label = trans('date.dayOfWeek.saturday');
                break;
            default:
                $label = '';
        }

        return $label;
    }

    /**
     * @param $schoolId
     * @return mixed
     */
    private static function getDaysOffOfSchool($schoolId)
    {
        return (new SchoolConfigRepository())->getSchoolDayOffByDate($schoolId);
    }

    /**
     * Lấy danh sách các ngày trước / sau trong 1 tuần
     * @param $schoolId
     * @param Carbon $date
     * @param int $numWeek
     * @return mixed
     */
    public static function getDateRangeByWeekPreviousAndAfterOfDate($schoolId, Carbon $date, $numWeek = 1)
    {
        $fromDate = $date->copy()->subWeek($numWeek);
        $toDate   = $date->copy()->addWeek($numWeek);

        $range = self::getSchoolDateRange($schoolId, $fromDate, $toDate);

        return collect($range)->pluck('date')->map(function ($date) {
            return Carbon::parse($date);
        });
    }

    /**
     * Display date with format
     * @param $date_input
     * @param string $format_dat
     * @return string
     */
    public static function getDisplayDate($date_input, $format_dat = DISPLAY_DATE_FORMAT)
    {
        return empty($date_input) ? "" : Carbon::parse($date_input)->format($format_dat);
    }
}
