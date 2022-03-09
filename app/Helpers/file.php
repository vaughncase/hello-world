<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\File;

/**
 *File name : file.php  / Date: 12/11/2021 - 10:04 AM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

function makePathByDate($folder, Carbon $date = null)
{
    if (is_null($date)) {
        $date = Carbon::today();
    }
    $day          = $date->copy()->format('d');
    $month        = $date->copy()->format('m');
    $year         = $date->copy()->format('Y');
    $year_folder  = getDirectory($folder, $year);
    $month_folder = getDirectory($year_folder, $month);
    $day_folder   = getDirectory($month_folder, $day);

    return $day_folder;
}

function getDirectory($main_folder, $sub_folder)
{
    if (substr($main_folder, -1) != '/') {
        $main_folder .= '/';
    }
    if (substr($sub_folder, -1) != '/') {
        $sub_folder .= '/';
    }

    $newPath = $main_folder . $sub_folder;
    if (!File::exists($newPath)) {
        File::makeDirectory($newPath, 755, true);
    }

    return $newPath;
}

function moveFileToFolder($file, $folder, $date = null)
{
    $name = time() . '-' . trim($file->getClientOriginalName());

    return $file->move(makePathByDate($folder, $date), $name);
}

function containString($string, $array_match)
{
    foreach ($array_match as $compare_string) {
        if (is_numeric(strpos($string, $compare_string))) {
            return $compare_string;
        }
    }

    return false;
}

