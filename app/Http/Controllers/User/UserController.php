<?php

namespace App\Http\Controllers\User;

use App\Entities\UserEntity;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function create(){

        $paramsKey = [
            'username',
            'password',
            'confirm_password',
            'full_name'
        ];

        if(!$this->validateParameterKeys($paramsKey) || $this->data['password'] != $this->data['confirm_password']){
            return $this->responseMissingParameters();
        }

        $existUser = (new UserEntity())->getUserInfoByUsername($this->data['username']);
        if(!is_null($existUser)){
            return $this->responseError(trans('user.exist_username'));
        }

        $user = $this->userRepository->createUser($this->data, $this->moetUnitId);

        return $this->respondSuccess([
            'username' => $user->username,
            'full_name'=> $user->getFullName(),
            'email'    => $user->email,
            'phone'    => $user->phone,
            'avatar'   => $user->avatar,
            'date_of_birth' => $user->date_of_birth
        ]);
    }
}
