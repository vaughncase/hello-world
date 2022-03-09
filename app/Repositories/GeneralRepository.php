<?php
/**
 *File name : GeneralRepository.php  / Date: 12/3/2021 - 2:59 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Repositories;


use App\Repositories\Config\AppModuleRepository;

class GeneralRepository
{

    protected $moduleRepository;

    public function __construct()
    {
        $this->moduleRepository = new AppModuleRepository();
    }

    public function isUseQuickAssessment($schoolId)
    {
        return $this->moduleRepository->checkModuleByKey($schoolId, 'disabled-quick-assessment', WEB_APP_TYPE) ? 0 : 1;
    }

    public function isUseCommentSample($schoolId)
    {
        return $this->moduleRepository->checkModuleByKey($schoolId, 'use-comment-sample', WEB_APP_TYPE) ? 1 : 0;
    }

    public function isUseStatusSleep($schoolId)
    {
        return $this->moduleRepository->checkModuleByKey($schoolId, 'use-sleep-status', WEB_APP_TYPE) ? 1 : 0;
    }

    public function isUseSleepTimeDefault($schoolId)
    {
        return $this->moduleRepository->checkModuleByKey($schoolId, 'use-sleep-time-default', WEB_APP_TYPE) ? 1 : 0;
    }

    public function isUseFilterSleepNotification($schoolId)
    {
        return $this->moduleRepository->checkModuleByKey($schoolId, 'filter-sleep-notification', WEB_APP_TYPE) ? 1 : 0;
    }

    public function isUseViewMenuWeek($schoolId){
        return $this->moduleRepository->checkModuleByKey($schoolId, 'view-menu-week', WEB_APP_TYPE) ? 1 : 0;
    }

}