<?php
/**
 *File name : ExcelImportLib.php  / Date: 12/15/2021 - 2:03 PM
 *Code Owner: Dao Thi Minh Nguyet / Phone: 0985455294 / Email: nguyetdtm@omt.vn
 */

namespace App\Helpers\Libraries;


use App\Http\Controllers\Excel\BaseImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportLib
{

    /**
     * Filter
     * @var array
     */
    protected $filters = [
        'registered' => [],
        'enabled'    => []
    ];

    protected $excel;
    protected $reader;
    protected $writer;
    protected $sheet_index_data;
    protected $index_row_data = 2;

    public function __construct($sheet_index_data = 0)
    {
        $this->sheet_index_data = $sheet_index_data;
    }

    public function load($file)
    {
        $basicImport = new BaseImport();
        Excel::import($basicImport, $file);
        $all_sheets = (new BaseImport)->handleReturn();
//        $all_sheets = Excel::toArray(new BaseImport(2), $file);
        dd(1, $all_sheets);
        $rows       = isset($all_sheets[$this->sheet_index_data]) ? $all_sheets[$this->sheet_index_data] : $all_sheets[0];
        $data_items = [];

        $header_code = $rows[0] ?? [];

        foreach ($header_code as $index => $item) {
            $header_code[$index] = !empty($item) ? str_replace(' ', '_',
                strtolower($item)) : null;
        }

        unset($rows[0]);
        foreach ($rows as $row_data) {
            $data = [];
            foreach ($row_data as $key => $row) {
                if (!empty($header_code[$key])) {
                    $data[$header_code[$key]] = $row;
                }
            }
            $data_items[] = $data;
        }

        $this->reader = $data_items;

        return $this;
    }

    public function get()
    {
        return $this;
    }

    public function toArray()
    {
        return $this->reader;
    }
}