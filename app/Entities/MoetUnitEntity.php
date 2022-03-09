<?php
/**
 *File name : UserEntity.php  / Date: 11/6/2021 - 9:50 AM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Entities;


use App\Models\Moet\MoetUnit;

class MoetUnitEntity
{


    public function __construct()
    {
    }

    public function getMoetUnitInfo($moetUnitId)
    {
        $moetUnit = (new MoetUnit())->getModelCache($moetUnitId);

        if (is_null($moetUnit)) {
            return null;
        }

        return $moetUnit;
    }

    public function getListMoetUnitsByLevel($moetLevel)
    {
        return MoetUnit::where('moet_level', $moetLevel)->get();
    }

    public function getListMoetUnitsByParentId($parentId, $moetLevel)
    {
        $parentId = is_array($parentId) ? $parentId : [$parentId];
        return MoetUnit::whereIn('parent_id', $parentId)->where('moet_level', $moetLevel)->get();
    }

    public function getListMoetUnitForUser($user)
    {
        $rolesUser     = $user->roles()->get();
        $moetIdsOfUser = $rolesUser->pluck('moet_unit_id')->toArray();
        $moetUnits     = $this->getListMoetUnitByUser($moetIdsOfUser);
        return collect($moetUnits)->pipe(function($collection) {
            $array = $collection->toArray();
            $ids   = [];
            array_walk_recursive($array, function($value, $key) use (&$ids) {
                if ($key === 'id') {
                    $ids[] = $value;
                };
            });
            return $ids;
        });
    }

    public function getListMoetUnitByUser($moetIds)
    {
        $moetUnits = $this->getListMoetUnitByIds($moetIds);
        if (count($moetUnits) == 0) {
            return [];
        }
        $moetUnitsArray = [];
        foreach ($moetUnits as $index => $moetUnit) {
            if (count($moetUnit->moetUnitChildren()) == 0) {
                $moetUnitsArray[] = $moetUnit->toArray();
            } else {
                $moetUnitChildrenIds = $moetUnit->moetUnitChildren()->pluck('id')->toArray();
                $moetUnitsArray[]    = array_merge($moetUnit->toArray(),
                    $this->getListMoetUnitByUser($moetUnitChildrenIds));
            }
        }
        return $moetUnitsArray;
    }

    public function getListMoetUnitByIds($moetUnitIds)
    {
        $moetUnitIds = is_array($moetUnitIds) ? $moetUnitIds : [$moetUnitIds];
        return MoetUnit::whereIn('id', $moetUnitIds)->get();
    }


}