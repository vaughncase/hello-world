<?php

namespace App\Repositories;

use App\Exceptions\ApiException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;

abstract class BaseRepository
{

    protected $list_search_fields;
    protected $model_class;
    protected $keyword_search = 'keyword_search';

    public function __construct()
    {
        $this->list_search_fields = [];//Danh sach field dung de search like
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model_class = app()->make($this->getModel());
    }

    public function getData(
        $conditions = [],
        $with = null,
        $order_by = [],
        $skip = 0,
        $take = 0,
        $columns = ['*'],
        $get_first = false
    )
    {
        $query = $this->model_class->where('deleted_at', null);
        if (isset($conditions[$this->keyword_search])) {
            $keyword_search = $conditions[$this->keyword_search];

            $query->where(function ($query) use ($keyword_search) {
                foreach ($this->list_search_fields as $key => $search_field) {
                    if ($key == 0) {
                        $query->where($search_field, 'like', "%$keyword_search%");
                    } else {
                        $query->orWhere($search_field, 'like', "%$keyword_search%");
                    }
                }
            });
            unset($conditions[$this->keyword_search]);
        }
        foreach ($conditions as $condition_key => $condition_item) {
            if (is_null($condition_item) || empty($condition_key)) {
                continue;
            }

            if (is_array($condition_item)) {
                $query->whereIn($condition_key, $condition_item);
            } else {
                $query->where($condition_key, $condition_item);
            }
        }

        foreach ($order_by as $order_key => $order_value) {
            $query->orderBy($order_key, $order_value);
        }

        if (!empty($take)) {
            $query->skip($skip)->take($take);
        }

        if (!empty($with)) {
            $query->with($with);
        }

        if ($get_first) {
            return $query->first();
        }
        return $query->get($columns);
    }

    public function convertDataBeforeCreate($data)
    {
        if ($this->checkDataUniqueColumn($data)) {
            throw  new ApiException(\response()->json([
                'status' => STATUS_ERROR,
                'message' => $this->model_class->getMessageValidateUniqueColumn(),
            ]));
        }
        $attributes = $this->model_class->getFillable();

        $dataCreate = [];
        foreach ($attributes as $index => $field) {
            if (isset($data[$field])) {
                $dataCreate[$field] = $data[$field];
            }
            if ($field == "created_user_id") {
                $dataCreate['created_user_id'] = Auth::check() ? Auth::user()->id : 0;
            }
        }

        return $dataCreate;
    }

    public function getById($id)
    {
        return $this->model_class->where('id', $id)->first();
    }

    public function create($data)
    {
        return $this->model_class->create($data);
    }

    public function handleAfterCreate(Model $item, $data)
    {
        return $item;

    }

    public function firstOrCreate($data)
    {
        return $this->model_class->firstOrCreate($data);
    }

    public function updateOrCreate($condition, $data)
    {
        return $this->model_class->updateOrCreate($condition, $data);
    }

    public function update($data, $id)
    {
        $data_info = $this->find($id);
        if (empty($data_info)) {
            return false;
        } else {
            return $data_info->update($data);
        }
    }

    public function delete($id)
    {
        $data_info = $this->find($id);
        if (empty($data_info)) {
            return false;
        } else {
            return $data_info->delete();
        }
    }

    public function deleteByParam($conditions)
    {
        $query = $this->model_class->where('deleted_at', null);
        foreach ($conditions as $condition_key => $condition_item) {
            if (is_null($condition_item) || empty($condition_key)) {
                continue;
            }
            if (is_array($condition_item)) {
                $query->whereIn($condition_key, $condition_item);
            } else {
                $query->where($condition_key, $condition_item);
            }
        }
        $query->delete();
    }

    public function find($id)
    {
        return $this->model_class->find($id);
    }

    public function getFirst()
    {
        return $this->model_class->first();
    }

    public function bulkInsert($data_multiple, $number_chunk = 200)
    {
        if (empty($data_multiple))
            return true;
        $data_insert = array_chunk($data_multiple, $number_chunk);
        foreach ($data_insert as $item) {
            $this->model_class->insert($item);
        }
        return true;
    }

    private function checkDataUniqueColumn($data)
    {
        if (method_exists($this->model_class, 'getUniqueColumn')) {
            $column = $this->model_class->getUniqueColumn();
            $records = DB::table($this->model_class->getTable())
                ->select($column)
                ->distinct()
                ->get();
            return $records->contains($column, $data[$column]);
        }
        return false;
    }

}
