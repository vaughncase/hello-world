<?php


namespace App\Repositories\Authorization;


use App\Models\Authorization\AccessRole;
use App\Repositories\BaseRepository;

class AccessRoleRepository extends BaseRepository
{


    public function __construct()
    {
        parent::__construct();
    }

    public function getModel()
    {
        return AccessRole::class;
    }

    public function storeItem($data)
    {
        return $this->create($data);
    }

    public function handleAfterCreate($item, $data)
    {
        $item = parent::handleAfterCreate($item, $data);
        if (!empty($data['permissions'])){
            $item->permissions()->sync($data['permissions']);
        }
    }

}