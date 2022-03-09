<?php


namespace App\Helpers\Transformer;


class UserTransformer extends \Transformer
{

    public function transform($item)
    {
        return array_merge($item, ['full_name' => getFullNameOfUser($item)]);
    }

}