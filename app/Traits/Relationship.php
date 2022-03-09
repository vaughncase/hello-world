<?php


namespace App\Traits;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

trait Relationship
{

    protected $statusKeys;
    protected $statusKey;
    protected $typesKey;
    protected $typeKey;

    public function __construct()
    {
        $this->statusKeys = ['status', 'deleted_at', 'is_deleted'];
        $this->statusKey  = ['status'];
        $this->typesKey   = ['type', 'relationship', 'user_type', 'shift', 'content', 'permission'];
        $this->typeKey    = 'type';
    }

    public function relationAttach(
        Model $model,
        $localKey,
        $foreignKey,
        $dataConnect,
        $type = 0,
        $detach_all = true
    ) {
        $fillable     = $model->getFillable();
        $statusKey    = $this->getFillAbleKey($this->statusKeys, $this->statusKey, $fillable);
        $typeKey      = $this->getFillAbleKey($this->typesKey, $this->typeKey, $fillable);
        $usingOffset  = Schema::hasColumn($model->getTable(), 'offset');
        $all_connects = $this->getConnectQuery($model, $localKey, $type, $statusKey, $typeKey);

        $connectedIds = $usingOffset ? [] : $this->getConnectIdsNotUseOffset($all_connects, $dataConnect,
            $foreignKey, $statusKey);

        if ($detach_all) {
            $this->detachAll($model, $all_connects, $localKey, $foreignKey, $type, $connectedIds,
                $statusKey, $typeKey);
        }

        $dataInsert = $this->makeDataInsert($dataConnect,
            $connectedIds,
            $localKey,
            $foreignKey,
            $type,
            $statusKey,
            $typeKey,
            $usingOffset,
            $fillable);

        $model->insert($dataInsert);
        $result = $statusKey === "is_deleted" ? $model->where("$statusKey",
            0) : $model->where("$statusKey", 1);

        return $result->where("$localKey", $this->id)->get();
    }

    public function relationDetach(Model $model, $localKey, $foreignKey, $data_disconnect, $type = 0)
    {
        $fillable  = $model->getFillable();
        $statusKey = $this->getFillAbleKey($this->statusKeys, $this->statusKey, $fillable);
        $typeKey   = $this->getFillAbleKey($this->typesKey, $this->typeKey, $fillable);
        $connected = $this->getConnectSoftDelete($model,
            $localKey,
            $type,
            $statusKey,
            $typeKey,
            $foreignKey,
            $data_disconnect);

        foreach ($connected as $connect) {
            $this->updateStatusKey($connect, $statusKey);
        }

        return $model->where("$localKey", $this->id)
            ->where("$statusKey", '<>', 1)
            ->get();
    }

    public function updateStatusKey($connect, $statusKey)
    {
        $statusUpdate = $statusKey === "is_deleted" ? (int)1 : (int)0;
        $connect->update(["$statusKey" => $statusUpdate]);
        $connect->recordLog('DELETED');
    }

    public function detachAll(
        Model $model,
        $all_connects,
        $localKey,
        $foreignKey,
        $type,
        $connectedIds,
        $statusKey,
        $typeKey
    ) {
        $all_connects->filter(function ($connect) use ($foreignKey, $connectedIds, $statusKey) {
            $valueStatusKey = $statusKey === "is_deleted" ? 0 : 1;

            return $connect->$statusKey == $valueStatusKey && !in_array($connect->$foreignKey, $connectedIds);
        })->each(function ($connect) use ($statusKey) {
            $this->updateStatusKey($connect, $statusKey);
        });

        if ($type != 0) {
            $model->where("$localKey", $this->id)->where("$typeKey", '<>', $type)->get()
                ->each(function ($connect) use ($statusKey) {
                    $this->updateStatusKey($connect, $statusKey);
                });
        }
    }

    public function getConnectIdsNotUseOffset($all_connects, $dataConnect, $foreignKey, $statusKey)
    {
        $exist_connects = $all_connects->filter(function ($connect) use ($dataConnect, $foreignKey) {
            return in_array($connect->$foreignKey, $dataConnect);
        });
        foreach ($exist_connects as $connect) {
            if ($statusKey === "is_deleted") {
                if ($connect->$statusKey != 0) {
                    $connect->update(["$statusKey" => 0]);
                    $connect->recordLog('ACTIVATED');
                }
            } else {
                if ($connect->$statusKey != 1) {
                    $connect->update(["$statusKey" => 1]);
                    $connect->recordLog('ACTIVATED');
                }
            }
        }

        return $exist_connects->pluck("$foreignKey")->toArray();
    }

    public function getConnectQuery(Model $model, $localKey, $type, $statusKey, $typeKey)
    {
        $all_connects_query = $model->where("$localKey", $this->id);
        $all_connects_query = $type === 0 ? $all_connects_query : $all_connects_query->where("$typeKey", $type);
//        $all_connects_query = $statusKey === 'is_deleted'
//            ? $all_connects_query->where($statusKey, 0) : $all_connects_query->where((string)$statusKey, 1);
        $all_connects       = $all_connects_query->get();

        return $all_connects;
    }

    public function getConnectSoftDelete(
        Model $model,
        $localKey,
        $type,
        $statusKey,
        $typeKey,
        $foreignKey,
        $data_disconnect
    ) {
        $connected_query = $model->where("$localKey", $this->id)
            ->whereIn("$foreignKey", $data_disconnect);
        $connected_query = $statusKey === 'is_deleted' ? $connected_query->where((string)$statusKey,
            0) : $connected_query->where((string)$statusKey, 1);

        $connected_query = $type == 0 ? $connected_query : $connected_query->where("$typeKey", $type);

        return $connected_query->get();
    }

    public function getFillAbleKey($keys, $key, $fillable)
    {
        foreach ($keys as $value) {
            if (in_array($key, $fillable)) {
                $key = $value;
            }
        }

        return $key;
    }

    public function makeDataInsert(
        $dataConnect,
        $connectedIds,
        $localKey,
        $foreignKey,
        $type,
        $statusKey,
        $typeKey,
        $usingOffset,
        $fillable
    ) {
        $new_connect_ids  = array_diff($dataConnect, $connectedIds);
        $dataInsert      = [];
        $first_log        = [];
        $app              = app();
        $new_log          = $app->make('stdClass');
        $new_log->user_id = Auth::user()->id;
        $new_log->action  = 'ACTIVATED';
        $new_log->time    = Carbon::now()->timestamp;
        $new_log->ip      = getClientIP();
        array_push($first_log, $new_log);

        $offset = 1;
        foreach ($new_connect_ids as $key => $new_connect_id) {
            $valueStatusKey = $statusKey === "is_deleted" ? 0 : 1;
            $dataConnect    = [
                "$localKey"   => $this->id,
                "$foreignKey" => $new_connect_id,
                "$statusKey"  => $valueStatusKey,
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now(),
            ];
            if ($type != 0) {
                if (isset($type[$key])) {
                    $dataConnect["$typeKey"] = $type[$key];
                } else {
                    $dataConnect["$typeKey"] = $type;
                }
            }

            if ($usingOffset) {
                $dataConnect['offset'] = $offset;
                $offset                += 1;
            }

            if (in_array('created_user_id', $fillable)) {
                $dataConnect['created_user_id'] = Auth::user()->id;
            }
            if (in_array('logs', $fillable)) {
                $dataConnect['logs'] = json_encode($first_log);
            }

            array_push($dataInsert, $dataConnect);
        }

        return $dataInsert;
    }
}