<?php
/**
 *File name : helper.php  / Date: 11/3/2021 - 10:37 AM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

use App\Repositories\Config\HolidayRepository;
use App\Repositories\Config\SchoolConfigRepository;
use App\Repositories\Config\TaskCheckingRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;


function checkDayOffOrHolidayDateOfSchool($schoolId, Carbon $date)
{
    $isDayOff = (new SchoolConfigRepository())->checkSchoolDayOffByDate($schoolId, $date);
    if ($isDayOff) {
        return true;
    }

    return (new HolidayRepository)->checkDateIsHolidayOfSchool($schoolId, $date);
}

function checkClassAttendanceTaskByDate($classId, Carbon $date)
{
    return (new TaskCheckingRepository())->checkClassAttendanceTaskByDate($classId, $date);
}

function custom_asset($url, $domain = "")
{
    $domain = isBlankString($domain) ? env('DOMAIN_FILES', 'https://files.ko.edu.vn') : $domain;
    $current_host = env('DOMAIN_MANAGER', 'http://ko-teachers.test');
    $url = str_replace('http://', 'https://', $url);

    return str_replace($current_host, $domain, $url);
}

function customAssetAvatar($avatar, $domain = "")
{
    $current_host = env('DOMAIN_KO_MASTER', 'http://webapp.test');
    $avatar = is_null($avatar) || trim($avatar) == '' ? 'public/new-studentAvatar/NOIMAGE.jpg' : $avatar;
    $url = containString($avatar, ['https://']) ? $avatar : $current_host . $avatar;

//    $url          = str_replace('http://', 'https://', $url);

    return $url;
}

if (!function_exists('urlGenerator')) {
    /**
     * @return \Laravel\Lumen\Routing\UrlGenerator
     */
    function urlGenerator()
    {
        return new \Laravel\Lumen\Routing\UrlGenerator(app());
    }
}

if (!function_exists('asset')) {
    /**
     * @param $path
     * @param bool $secured
     *
     * @return string
     */
    function asset($path, $secured = false)
    {
        return urlGenerator()->asset($path, $secured);
    }
}

if (!function_exists('getFullNameOfUser')) {
    /**
     * @param $user
     *
     * @return string
     */
    function getFullNameOfUser($user)
    {
        if (is_null($user)) {
            return "";
        }
        $name = $user['last_name'] . " " . $user['middle_name'] . " " . $user['first_name'];

        return convertUnicode($name);
    }
}
if (!function_exists('isExtensionImage')) {
    function isExtensionImage($type)
    {
        $types = ['jpg', 'jpeg', 'png', 'gif', 'tiff', 'bmp', 'heic', 'heif'];
        $type = strtolower($type);

        return in_array($type, $types);
    }
}
if (!function_exists('isExtensionVideo')) {
    function isExtensionVideo($type)
    {
        $types = [
            "mp4",
            "m4a",
            "m4v",
            "f4v",
            "f4a",
            "m4b",
            "m4r",
            "f4b",
            "mov",
            "3gp",
            "3gp2",
            "3g2",
            "3gpp",
            "3gpp2",
            "ogg",
            "oga",
            "ogv",
            "ogx",
            "wmv",
            "wma",
            "asf*",
            "webm",
            "flv",
        ];
        $type = strtolower($type);

        return in_array($type, $types, true);
    }
}
if (!function_exists('cleanModel')) {
    function cleanModel(Model $model)
    {
        $attributes = $model->getDirty();

        $model_attributes = $model['attributes'];
        foreach ($attributes as $key => $attribute) {
            if (isset($model_attributes[$key])) {
                unset($model_attributes[$key]);
            }
            unset($model->$attribute);
        }
        $model['attributes'] = $model_attributes;

        return $model;
    }
}


if (!function_exists('getClientIp')) {
    function getClientIp()
    {
        if (getenv('HTTP_CLIENT_IP')) {
            return getenv('HTTP_CLIENT_IP');
        }
        if (getenv('HTTP_X_FORWARDED_FOR')) {
            return getenv('HTTP_X_FORWARDED_FOR');
        }
        if (getenv('HTTP_X_FORWARDED')) {
            return getenv('HTTP_X_FORWARDED');
        }
        if (getenv('HTTP_FORWARDED_FOR')) {
            return getenv('HTTP_FORWARDED_FOR');
        }
        if (getenv('HTTP_FORWARDED')) {
            return getenv('HTTP_FORWARDED');
        }
        if (getenv('REMOTE_ADDR')) {
            return getenv('REMOTE_ADDR');
        }
        return 'UNKNOWN';
    }
}

if (!function_exists('getClientAgent')) {
    function getClientAgent()
    {
        return isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'SYSTEM';
    }
}

if (!function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param string $path
     *
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}
if (!function_exists('get_directory')) {
    function get_directory($main_folder, $sub_folder)
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
}
if (!function_exists('base64ToImage')) {

    function base64ToImage($image)
    {
        $image = substr($image, strpos($image, ',') + 1);
        $image = str_replace(' ', '+', $image);

        return base64_decode($image);
    }

}

if (!function_exists('randomString')) {

    function randomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

}

if (!function_exists('validatePhoneNumber')) {
    function validatePhoneNumber($str)
    {
        $str = str_replace(" ", "", $str);
        $str = str_replace("-", "", $str);
        if (preg_match('/^[+0-9]{10,13}$/', $str)) {
            return $str;
        } else {
            return "";
        }
    }
}

if (!function_exists('validatePhoneUser')) {
    function validatePhoneUser($user)
    {
        if ($user->mobile_phone != '' && $user->mobile_phone != null && validatePhoneNumber($user->mobile_phone)) {
            return $user->mobile_phone;
        }

        if ($user->username != '' && $user->username != null && validatePhoneNumber($user->username)) {
            return $user->username;
        }

        if ($user->home_phone != '' && $user->home_phone != null && validatePhoneNumber($user->home_phone)) {
            return $user->home_phone;
        }

        return false;
    }

}

if (!function_exists('standardString')) {
    function standardString($str)
    {
        // Khoang trang thua o ben trai va ben phai
        $str = trim($str);

        $array = explode(" ", $str);

        foreach ($array as $key => $value) {
            if (trim($value) == null) {
                unset($array[$key]);
            }
        }

        $str = implode(" ", $array);

        return $str;
    }
}


