<?php


namespace App\Libs;

class RedisLibMaster
{

    public static function getRedisClientInstall()
    {
        try {
            $redis_log_host     = empty(env('REDIS_QUEUE_HOST')) ? "localhost" : env('REDIS_QUEUE_HOST');
            $redis_log_port     = empty(env('REDIS_QUEUE_PORT')) ? 6379 : env('REDIS_QUEUE_PORT');
            $redis_log_password = empty(env('REDIS_QUEUE_PASSWORD')) ? "" : env('REDIS_QUEUE_PASSWORD');
            $redis_log_db       = empty(env('REDIS_QUEUE_DB')) ? 13 : env('REDIS_QUEUE_DB');

            return new RedisClientLib($redis_log_host, $redis_log_port, $redis_log_password, $redis_log_db);
        } catch (\Exception | \InvalidArgumentException $ex) {
            return null;
        }
    }

    public static function getQueueByQueueName($queueName, $from = 0, $to = null)
    {
        $redis_log_host     = env('REDIS_QUEUE_HOST', "localhost");
        $redis_log_port     = env('REDIS_QUEUE_PORT', 6379);
        $redis_log_password = env('REDIS_QUEUE_PASSWORD', "");
        $redis_log_db       = env('REDIS_QUEUE_DB', 13);
        $redis              = new RedisClientLib($redis_log_host, $redis_log_port, $redis_log_password, $redis_log_db);
        if ($to == null) {
            $to = $redis->cmd("LLEN", $queueName)->get();
        }
        return $redis->cmd("LRANGE", $queueName, $from, $to)->get();
    }

    public static function getRedisPOCClientInstall()
    {
        try {
            //            $redis_log_host = "10.10.20.70";
            $redis_log_host     = env('REDIS_QUEUE_HOST_POC', "10.10.20.70");
            $redis_log_port     = env('REDIS_QUEUE_PORT', 6379);
            $redis_log_password = env('REDIS_QUEUE_PASSWORD_POC', "3pBwbRg4FvrB");
            $redis_log_db       = env('REDIS_QUEUE_DB', 13);
            return new RedisClientLib($redis_log_host, $redis_log_port, $redis_log_password, $redis_log_db);
        } catch (\Exception $ex) {
            return null;
        } catch (\InvalidArgumentException $ex1) {
            return null;
        }
    }

}

