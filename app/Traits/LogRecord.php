<?php


namespace App\Traits;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait LogRecord
{

    /**
     * Hàm này dùng trước khi model được update - chỉ lưu trạng thái trước đó
     * và dữ liệu sẽ được update
     *
     * @param $action
     * @param array $update_data
     * @param array $after_data
     * @param null $original_data
     */
    public function recordLog(
        $action,
        $update_data = [],
        $after_data = [],
        $original_data = null
    ) {
        $table_name  = $this->getTableName();
        $item_key    = $this->table === "users" ? "user_id" : "item_id";
        $user_key    = $this->table === "users" ? "by_user_id" : "user_id";
        $data_insert = array(
            $item_key     => $this->id,
            'item_type'   => $this->getMorphClass(),
            'item_table'  => $this->table,
            'action'      => $action,
            'data'        => $original_data ? json_encode($original_data) : json_encode($this->getAttributes()),
            'update_data' => json_encode($update_data),
            'after_data'  => json_encode($after_data),
            $user_key     => Auth::check() ? Auth::user()->id : 0,
            'ip'          => getClientIP(),
            'agent'       => getClientAgent(),
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        );
        $data_insert = $this->checkTableAddColumn($table_name, $data_insert, $this);
        DB::table($table_name)->insert($data_insert);
    }

    public static function recordMultiLogs(
        $models,
        $action,
        $update_data = [],
        $after_data = []
    ) {
        $multi_data_insert = [];

        foreach ($models as $model) {
            array_push($multi_data_insert, [
                'item_id'     => $model->id,
                'item_type'   => $model->getMorphClass(),
                'item_table'  => $model->table,
                'action'      => $action,
                'data'        => json_encode($model->getAttributes()),
                'update_data' => json_encode($update_data),
                'after_data'  => json_encode($after_data),
                'user_id'     => Auth::check() ? Auth::user()->id : 0,
                'ip'          => getClientIP(),
                'agent'       => getClientAgent(),
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ]);
        }

        DB::table('record_logs')->insert($multi_data_insert);
    }

    /**
     * @return string
     */
    private function getTableName(): string
    {
        switch ($this->table) {
            case "users":
                $table_name = "user_record_logs";
                break;
            case "albums":
            case "posts":
                $table_name = "album_post_record_logs";
                break;
            case "student_assessment_results_":
                $table_name = "assessment_records_logs";
                break;
            case "student_medicine_notes":
            case "student_absent_requests":
            case "messages_morning":
            case "student_transporter_day":
                $table_name = "ticket_logs";
                break;
            default:
                $table_name = "record_logs";
                break;
        }

        return $table_name;
    }

    private function checkTableAddColumn($table_name, $data_insert, $model)
    {
        try {
            switch ($table_name) {
                case "assessment_records_logs":
                    $data_input = [
                        'school_id' => $model->school_id,
                    ];

                    return array_merge($data_insert, $data_input);
                case "ticket_logs":
                    $data_input = [
                        'type' => $model->typeTicket(),
                    ];

                    return array_merge($data_insert, $data_input);
                default:
                    return $data_insert;
            }
        } catch (\Exception $e) {
            return $data_insert;
        }
    }
}