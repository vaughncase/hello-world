<?php

namespace App\Jobs;


class StoreRecordLog extends Job
{

    protected $entity;
    protected $dataUpdate;
    protected $action;

    /**
     * Create a new job instance.
     *
     * @param $entity
     * @param $action
     * @param  array  $dataUpdate
     */
    public function __construct($entity, $action, $dataUpdate = [])
    {
        $this->entity     = $entity;
        $this->action     = $action;
        $this->dataUpdate = $dataUpdate;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->entity->recordLog($this->action, $this->entity->toArray());
    }

}
