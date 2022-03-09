<?php

/**
 *File name : ViewerTransFormer.php / Date: 1/11/2022 - 4:33 PM
 *Code Owner: Thanhnt/ Email: Thanhnt@omt.com.vn/ Phone: 0384428234
 */
class ViewerTransFormer extends Transformer
{

    public function transform($item)
    {
        return isset($item['user']) ? [
            'id'     => $item['id'],
            'author' => getFullNameOfUser($item['user']),
            'email'  => $item['user']['email'],
            'phone'  => $item['user']['mobile_phone'],
        ] : [];
    }

}