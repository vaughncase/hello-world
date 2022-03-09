<?php
/**
 *File name : RedisQueueLib.php  / Date: 11/19/2021 - 3:44 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Helpers\Libraries;


use stdClass;

class RedisQueueLib
{

    const REDIS_DB = 15;

    public static function push($queueName, $type, $actionType, $data, $notificationData = array())
    {
        $data                        = is_array($data) || is_object($data) ? json_encode($data) : $data;
        $queueData                   = new stdClass();
        $queueData->type             = $type;
        $queueData->data             = $data;
        $queueData->notificationData = json_encode($notificationData);
        $queueData->actionType       = $actionType;
        $encodedData                 = json_encode($queueData);
        $redis                       = new RedisClient(env('REDIS_TIMELINE_HOST'), env('REDIS_TIMELINE_PORT'),
            env('REDIS_TIMELINE_PASSWORD'), env('REDIS_TIMELINE_DATABASE'), '15');
        $redis->Enqueue($queueName, $encodedData);
    }

    public static function makeProcessQueueName($type)
    {
        return PROCESS_QUEUE_NAME . "_{$type}";
    }

    public static function makeUpdateTimelineQueueName($type)
    {
        return UPDATE_PROCESS_QUEUE_NAME . "_{$type}";
    }
}