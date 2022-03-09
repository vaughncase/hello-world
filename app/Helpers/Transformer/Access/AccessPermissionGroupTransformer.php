<?php


namespace App\Helpers\Transformer\Access;


class AccessPermissionGroupTransformer extends \Transformer
{

    public function transform($item)
    {
        return array_merge($item, []);
    }

}