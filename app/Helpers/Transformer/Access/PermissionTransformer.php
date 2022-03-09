<?php


namespace App\Helpers\Transformer\Access;



class PermissionTransformer extends \Transformer
{

    public function transform($permission)
    {
        return [
            'id'          => $permission['id'],
            'code'        => $permission['code'],
            'name'        => $permission['name'],
            'description' => $permission['description'],
        ];
    }

}