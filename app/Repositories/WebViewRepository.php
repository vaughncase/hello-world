<?php
/**
 *File name : WebViewRepository.php  / Date: 8/4/2017 - 2:32 PM
 *Code Owner: Tke / thedc@omt.vn
 */

namespace App\Repositories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Config\Repository;
use Illuminate\Support\Facades\App;

class WebViewRepository extends Repository
{

    // đặt hạn token 2 tháng (60 ngày)
    public function token_mobile(User $user = null, $expiry = 86400, $parameters = [], $uid = 0)
    {
        $app              = app();
        $token            = $app->make('stdClass');
        $token->user_id   = !is_null($user) ? $user->id : $uid;
        $token->expiry    = Carbon::now()->addMinutes($expiry)->timestamp;
        $token->is_mobile = 1;
        $token->lang      = App::getLocale();
        if (!empty($parameters)) {
            foreach ($parameters as $key => $value) {
                $token->$key = $value;
            }
        }
        return encrypt(json_encode($token));
    }


}
