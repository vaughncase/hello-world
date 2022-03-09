<?php

namespace App\Http\Controllers;

use App\Entities\MoetUnitEntity;
use App\Exceptions\ApiException;
use Illuminate\Support\Facades\Config;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

    use ResponseController;

    protected $data;
    protected $status;
    protected $moetUnitId;
    protected $moetUnitLevel;
    protected $moetUnit;

    public function __construct()
    {
        $this->status = Config::get('error_status');
        $data = array_merge(\request()->header(), \request()->json()->all());
        $this->data = count($data) ? $data : request()->all();
        if (!count($this->data)) {
            throw new ApiException($this->responseMissingParameters());
        }
        $lang = request()->header('lang');
        app('translator')->setLocale($lang);

        $this->moetUnitId = $this->getMoetUnitIdByData();
        $this->moetUnit = (new MoetUnitEntity())->getMoetUnitInfo($this->moetUnitId);
        if (is_null($this->moetUnit)) {
            throw new ApiException($this->responseError(trans($this->status['not_found']['moet_unit'])));
        }
    }

    public function getMoetUnitIdByData()
    {
        return !is_null(request()->header('moetUnitId')) && trim(request()->header('moetUnitId')) != '' ?
            (int)request()->header('moetUnitId') : 0;
    }

    public function validateParameterKeys($paramKeys, $data = null)
    {
        $validate = true;
        $data = is_null($data) ? $this->data : $data;
        foreach ($paramKeys as $key) {
            if (!isset($data[$key])) {
                $validate = false;
                break;
            }
        }

        return $validate;
    }

    public function validateEmptyData(array $data, array $param_needed_validate)
    {
        $error = [];
        foreach ($param_needed_validate as $param) {
            if (empty($data[$param])) {
                $error[] = trans('api.param_requered', ['param' => $param]);
            }
        }
        return $error;
    }


}
