<?php
/**
 *File name : Sms.php  / Date: 1/17/2022 - 11:10 AM
 *Code Owner: Tke / Phone: 0367313134 / Email: thedc.it.94@gmail.com
 */
namespace App\Models\User;

class Sms{
    public static function convertPhoneNumber($phone, $standard=true){
        $phone = trim($phone," ");

        if($standard)
            $phone = Sms::standardPhone($phone);

        $first_character = substr($phone,0,1);
        $after_character = substr($phone,1);

        if($first_character === "0")
            return '84'.$after_character;

        if($first_character === "9" || $first_character === "1")
            return "84".$phone;

        $three_characters = substr($phone,0,3);
        if($three_characters === "+84")
            return str_replace("+84", "84" , $phone);

        return $phone;
    }

    public static function standardPhone($phone){

        $change_phones = Sms::getChangePhones();
        foreach($change_phones as $prefix_phone_1 => $prefix_phone_2){
            if(strpos($phone,$prefix_phone_1) == 0 && is_numeric(strpos($phone,$prefix_phone_1)))
                return Sms::stringReplaceFirst($prefix_phone_1,$prefix_phone_2,$phone);
        }

        return $phone;
    }

    public static function stringReplaceFirst($from_string, $to_string, $content)
    {
        $from_string = '/'.preg_quote($from_string, '/').'/';

        return preg_replace($from_string, $to_string, $content, 1);
    }

    public static function getChangePhones(){
        return array(
            // MOBILE PHONE
            '0120' => '070',
            '0121' => '079',
            '0122' => '077',
            '0126' => '076',
            '0128' => '078',

            //VINAPHONE
            '0123' => '083',
            '0124' => '084',
            '0125' => '085',
            '0127' => '081',
            '0129' => '082',

            // VIETTEL

            '0162' => '032',
            '0163' => '033',
            '0164' => '034',
            '0165' => '035',
            '0166' => '036',
            '0167' => '037',
            '0168' => '038',
            '0169' => '039',

            // Vietnamobile
            '0186' => '056',
            '0188' => '058',

            // Gtel
            '0199' => '059'
        );
    }
}