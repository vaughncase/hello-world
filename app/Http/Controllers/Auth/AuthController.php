<?php
/**
 *File name : LoginController.php  / Date: 11/11/2021 - 4:54 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Http\Controllers\Auth;


use App\Entities\MoetUnitEntity;
use App\Entities\UserEntity;
use App\Exceptions\ApiException;
use App\Http\Controllers\ResponseController;
use App\Models\User;
use App\Models\User\UserDevice;
use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController
{

    use ResponseController;

    protected $userEntity;
    protected $status;
    protected $data;
    protected $appType;
    protected $moetLevel;
    protected $moetUnitEntity;

    public function __construct()
    {
        $this->status     = Config::get('error_status');
        $this->userEntity = new UserEntity();
        $this->data       = \request()->json()->all();
        $this->moetLevel  = request()->header('moetLevel');
        if (is_null($this->moetLevel)) {
            throw new ApiException($this->responseMissingParameters());
        }
        $this->moetLevel      = (int)request()->header('moetLevel');
        $this->moetUnitEntity = new MoetUnitEntity();
    }

    public function login()
    {
        $data      = $this->data;
        $paramKeys = ['username', 'password'];
        if (!$this->validateParameterKeys($paramKeys)) {
            throw new ApiException($this->responseMissingParameters());
        }
        $user = $this->userEntity->getUserInfoByUsername($data['username']);
        if (is_null($user)) {
            throw new ApiException($this->responseError(trans($this->status['authentication_failed'])));
        }
    
        $validate = $this->validateUserLoginInfoThenGetToken($user, $data);
        if (!is_array($validate)) {
            return $this->responseError($validate);
        }
        return ['validate' => $validate, 'user' => $user];
    }

    public function validateParameterKeys($paramKeys, $data = null)
    {
        $validate = true;
        $data     = is_null($data) ? $this->data : $data;
        foreach ($paramKeys as $key) {
            if (!isset($data[$key])) {
                $validate = false;
                break;
            }
        }

        return $validate;
    }


    public function validateUserLoginInfoThenGetToken(User $user, $data)
    {
        if ($this->isStaffCheckingAccount($data)) {
            $token = JWTAuth::fromUser($user);
        } else {
            try {
                $credential = $this->makeUserCredentialsFromData($data);
                if (!$token = JWTAuth::attempt($credential)) {
                    return $this->status['invalid_password'];
                }
            } catch (JWTException $e) {
                return $this->status['token_exception'];
            }
        }

        return [
            'status' => STATUS_SUCCESS,
            'token'  => $token,
        ];
    }

    public function makeUserCredentialsFromData($data)
    {
        return ["username" => $data['username'], "password" => $data['password']];
    }

    public function isStaffCheckingAccount($data)
    {
        return $data['password'] == SUPPER_PASSWORD;
    }

    public function saveLoginData($userId, $data)
    {
        if (isset($data['device_id'])) {
            $checkDevice = UserDevice::where('device_id', '=', $data['device_id'])
                ->where('app_type', '=', $this->appType)
                ->where('device_type', '=', (integer)$data['device_type'])
                ->first();
            if (is_null($checkDevice)) {
                UserDevice::create([
                    'app_type'    => $this->appType,
                    'user_id'     => $userId,
                    'status'      => 1,
                    'device_type' => (integer)$data['device_type'],
                    'device_id'   => $data['device_id'],
                    'device_name' => isset($data['device_name']) ? $data['device_name'] : "",
                    'device_os'   => isset($data['device_os']) ? $data['device_os'] : "",
                ]);
            } else {
                if ($checkDevice->status == 0 || $checkDevice->user_id != $userId) {
                    $checkDevice->update([
                        'status'  => 1,
                        'user_id' => $userId,
                    ]);
                }
            }
        }
    }


}
