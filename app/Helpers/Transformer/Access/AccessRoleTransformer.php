<?php


namespace App\Helpers\Transformer\Access;


class AccessRoleTransformer extends \Transformer
{

    public function transform($item)
    {
        return [
            'id'           => $item['id'],
            'moet_unit_id' => $item['moet_unit_id'],
            'name'         => $item['name'],
            'code'         => $item['code'],
            'status'       => $item['status'] == STATUS_ACTIVE ? trans('general.active') : trans('general.de_active'),
            'count_users'  => count($item['users']),
        ];
    }

}