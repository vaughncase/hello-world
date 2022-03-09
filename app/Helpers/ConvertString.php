<?php
/**
 *File name : ConvertString.php  / Date: 11/2/2021 - 2:11 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

function convertUnicode($str)
{
    $str = str_replace(["à", "á", "ạ", "ả", "ã"], ['à', 'á', 'ạ', 'ả', 'ã'], $str);

    $str = str_replace(["ầ", "ấ", "ậ", "ẩ", "ẫ"], ['ầ', 'ấ', 'ậ', 'ẩ', 'ẫ'], $str);

    $str = str_replace(["ằ", "ắ", "ặ", "ẳ", "ẵ"], ['ằ', 'ắ', 'ặ', 'ẳ', 'ẵ'], $str);

    $str = str_replace(["À", "Á", "Ạ", "Ả", "Ã"], ['À', 'Á', 'Ạ', 'Ả', 'Ã'], $str);

    $str = str_replace(["Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ"], ['Ầ', 'Ấ', 'Ậ', 'Ẩ', 'Ẫ'], $str);

    $str = str_replace(["Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ"], ['Ằ', 'Ắ', 'Ặ', 'Ẳ', 'Ẵ'], $str);

    $str = str_replace(["è", "é", "ẹ", "ẻ", "ẽ"], ['è', 'é', 'ẹ', 'ẻ', 'ẽ'], $str);

    $str = str_replace(["ề", "ế", "ệ", "ể", "ễ"], ['ề', 'ế', 'ệ', 'ể', 'ễ'], $str);

    $str = str_replace(["È", "É", "Ẹ", "Ẻ", "Ẽ"], ['È', 'É', 'Ẹ', 'Ẻ', 'Ẽ'], $str);

    $str = str_replace(["Ề", "Ế", "Ệ", "Ể", "Ễ"], ['Ề', 'Ế', 'Ệ', 'Ể', 'Ễ'], $str);

    $str = str_replace(["ò", "ó", "ọ", "ỏ", "õ"], ['ò', 'ó', 'ọ', 'ỏ', 'õ'], $str);

    $str = str_replace(["ồ", "ố", "ộ", "ổ", "ỗ"], ['ồ', 'ố', 'ộ', 'ổ', 'ỗ'], $str);

    $str = str_replace(["ờ", "ớ", "ợ", "ở", "ỡ"], ['ờ', 'ó', 'ợ', 'ở', 'õ'], $str);

    $str = str_replace(["Ò", "Ó", "Ọ", "Ỏ", "Õ"], ['Ò', 'Ó', 'Ọ', 'Ỏ', 'Õ'], $str);

    $str = str_replace(["Ồ", "Ố", "Ộ", "Ổ", "Ỗ"], ['Ồ', 'Ố', 'Ộ', 'Ổ', 'Ỗ'], $str);

    $str = str_replace(["Ờ", "Ớ", "Ợ", "Ở", "Ỡ"], ['Ờ', 'Ớ', 'Ợ', 'Ỏ', 'Ỡ'], $str);

    $str = str_replace(["ì", "í", "ị", "ỉ", "ĩ"], ['ì', 'í', 'ị', 'ỉ', 'ĩ'], $str);

    $str = str_replace(["Ì", "Í", "Ị", "Ỉ", "Ĩ"], ['Ì', 'Í', 'Ị', 'Ỉ', 'Ĩ'], $str);

    $str = str_replace(["ù", "ú", "ụ", "ủ", "ũ"], ['ù', 'ú', 'ụ', 'ủ', 'ũ'], $str);

    $str = str_replace(["Ù", "Ú", "Ụ", "Ủ", "Ũ"], ['Ù', 'Ú', 'Ụ', 'Ủ', 'Ũ'], $str);

    $str = str_replace(["ừ", "ứ", "ự", "ử", "ữ"], ['ừ', 'ứ', 'ự', 'ử', 'ữ'], $str);

    $str = str_replace(["Ừ", "Ứ", "Ự", "Ử", "Ữ"], ['Ừ', 'Ứ', 'Ự', 'Ử', 'Ữ'], $str);

    $str = str_replace(["ỳ", "ý", "ỵ", "ỷ", "ỹ"], ['ỳ', 'ý', 'ỵ', 'ỷ', 'ỹ'], $str);

    $str = str_replace(["Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ"], ['Ỳ', 'Ý', 'Ỵ', 'Ỷ', 'Ỹ'], $str);

    return $str;
}

function convertString($str)
{
    // In thường
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = html_entity_decode($str);
    $str = str_replace([' ', '_'], '-', $str);
    $str = html_entity_decode($str);
    $str = str_replace("ç", "c", $str);
    $str = str_replace("Ç", "C", $str);
    $str = str_replace(" / ", "-", $str);
    $str = str_replace("\"", "-", $str);
    $str = str_replace("'", "-", $str);
    $str = str_replace("/", "-", $str);
    $str = str_replace(" - ", "-", $str);
    $str = str_replace("_", "-", $str);
    $str = str_replace(".", "-", $str);
    $str = str_replace(" ", "-", $str);
    $str = str_replace("?", "", $str);
    $str = str_replace("ß", "ss", $str);
    $str = str_replace("&", "", $str);
    $str = str_replace("%", "percent", $str);
    $str = str_replace("----", "-", $str);
    $str = str_replace("---", "-", $str);
    $str = str_replace("--", "-", $str);
    $str = str_replace(",", "", $str);
    $str = str_replace(":", "", $str);
    // In đậm
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);

    return strtolower($str); // Trả về chuỗi đã chuyển
}


/**
 * @param $str
 * @param bool $has_space
 *
 * @return string
 */
function convertName($str, $has_space = false)
{
    // In thường
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = html_entity_decode($str);
    $str = str_replace(
        [' ', '_', "ç", "Ç", " / ", "/", " - ", "_", ".", " ", "?", "ß", "&", "%", "----", "---", "--", ","],
        ['_', '_', "c", "C", "-", "-", "_", "_", "-", "", "", "ss", "", "percent", "-", "-", "-", ""],
        $str);


    // In đậm
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace('/[^a-zA-Z0-9\']/', '_', $str);
    $str = str_replace("'", '', $str);


    $str = $has_space ? str_replace([' ', '_'], ' ', $str) : $str;
    $str = html_entity_decode($str);

    return strtolower($str); // Trả về chuỗi đã chuyển
}

function translateDate_VN($string)
{
    $string = str_replace("Monday", "Thứ Hai", $string);
    $string = str_replace('Tuesday', 'Thứ Ba', $string);
    $string = str_replace('Wednesday', 'Thứ Tư', $string);
    $string = str_replace('Thursday', 'Thứ Năm', $string);
    $string = str_replace('Friday', 'Thứ Sáu', $string);
    $string = str_replace('Saturday', 'Thứ Bảy', $string);
    $string = str_replace('Sunday', 'Chủ Nhật', $string);

    $string = str_replace('January', 'Tháng Một', $string);
    $string = str_replace('February', 'Tháng Hai', $string);
    $string = str_replace('March', 'Tháng Ba', $string);
    $string = str_replace('April', 'Tháng Tư', $string);
    $string = str_replace('May', 'Tháng Năm', $string);
    $string = str_replace('June', 'Tháng Sáu', $string);
    $string = str_replace('July', 'Tháng Bảy', $string);
    $string = str_replace('August', 'Tháng Tám', $string);
    $string = str_replace('September', 'Tháng Chín', $string);
    $string = str_replace('October', 'Tháng Mười', $string);
    $string = str_replace('November', 'Tháng Mười Một', $string);
    $string = str_replace('December', 'Tháng Mười Hai', $string);

    return $string;
}

function formatNumberToString($number, $length)
{
    $number = '' . $number;
    $length = $length - strlen($number);
    $str    = '';
    if ($length > 0) {
        for ($i = 0; $i < $length; $i++) {
            $str .= '0';
        }
    }

    return $str . $number;
}

function analysisName($fullName)
{
    $names = explode(' ', $fullName);

    foreach ($names as $index => $word) {
        if ($word == "") {
            unset($names[$index]);
        }
    }
    $names = array_values($names);

    $length = count($names);

    if ($length == 1) {
        return [
            'last_name'   => '',
            'middle_name' => '',
            'first_name'  => $names[0],
        ];
    }
    if ($length == 2) {
        return [
            'last_name'   => $names[0],
            'middle_name' => '',
            'first_name'  => $names[1],
        ];
    } else {
        $middle_name = '';

        for ($i = 1; $i <= $length - 3; $i++) {
            $middle_name .= $names[$i] . ' ';
        }
        $middle_name .= $names[$length - 2];

        return [
            'last_name'   => $names[0],
            'middle_name' => $middle_name,
            'first_name'  => $names[$length - 1],
        ];
    }
}

function isBlankString($string)
{
    if (is_null($string)) {
        return true;
    }

    return strlen(trim($string)) == 0 ? true : false;
}

function getShortName($fullName)
{
    $names = explode(" ", $fullName);
    $name1 = last($names);
    array_pop($names);

    $name2 = last($names);
    array_pop($names);

    if (trim(convertUnicode(convertName($name2))) === "thi") {
        return $fullName;
    }

    return $name2 . ' ' . $name1;
}
