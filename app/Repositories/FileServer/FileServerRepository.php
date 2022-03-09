<?php
/**
 *File name : FileServerRepository.php  / Date: 6/22/2019 - 4:56 PM
 *Code Owner: Tke
 */

namespace App\Repositories\FileServer;

use App\Repositories\Repository;
use App\User;
use Auth;
use Carbon\Carbon;

class FileServerRepository extends Repository{

    public function __construct()
    {

    }

    public function encryptToken(User $user, $expiry=15, $parameters=array()){

        $token = new User();
        $token->user_id = $user->id;
        $token->expiry = Carbon::now()->addMinutes($expiry)->timestamp;
        $token->random_key = randomString(10);
        if(!empty($parameters)){
            foreach($parameters as $key=>$value){
                $token->$key = $value;
            }
        }
        return encrypt(json_encode($token));
    }

    public function decryptTokenAndLogin($token_encrypt){

        $token = json_decode(decrypt($token_encrypt));

        if(convertTimestampToDateTimeString($token->expiry)->timestamp < Carbon::now()->timestamp)
            return false;

        Auth::loginUsingId($token->user_id);
        return Auth::user();
    }

    public function saveSessionUserIdUpload($user_id){

    }


}