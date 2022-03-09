<?php
/*******************************************************************************
 * Copyright (c) OMT
 * Created by TIENNX
 *
 ******************************************************************************/

namespace App\Helpers;

use Illuminate\Support\Facades\Config;
use Ixudra\Curl\CurlService;
use SoapClient;

class ViettelSmsHelper
{

    protected $user;
    protected $password;
    protected $cpCode;

    protected $url = 'http://ams.tinnhanthuonghieu.vn:8009/bulkapi?wsdl';
    protected $client;
    protected $ServiceID;

    function __construct($params = array())
    {
        $this->client = new SoapClient($this->url);
        $this->user = isset($params['user']) ? $params['user'] : Config::get('code_sms.viettel_account.KidsOnline.user');
        $this->password = isset($params['password']) ? $params['password'] : Config::get('code_sms.viettel_account.KidsOnline.password');
        $this->cpCode = isset($params['cpCode']) ? $params['cpCode'] : Config::get('code_sms.viettel_account.KidsOnline.cpCode');
        $this->ServiceID = isset($params['ServiceID']) ? $params['ServiceID'] : Config::get('code_sms.viettel_account.KidsOnline.ServiceID');

    }

    /**
     * Bắn tin nhắn SMS thông qua SOAP
     * Params (case - sensitive):
     * User: tên đăng nhập
     * Password: mật khẩu
     * CPCode / ServiceID : tên brandname đã đăng ký
     * ReceiverID/ UserID: số điện thoại người nhận
     * RequestID: do server tự định nghĩa để đánh số thứ tự tin nhắn gửi đi
     * CommandCode: giá trị mặc định là "bulksms"
     * Content: nội dung tin nhắn
     * ContentType: 0: Tin nhắn không dấu; 1: Tin nhắn có dấu (Phải để giá trị là "0")
     * @param $params
     * @return array
     */
    public function sendMessage($params = null)
    {

        $serviceID = isset($params['brand_service_id']) ? $params['brand_service_id'] : $this->ServiceID;
        $params = array(
            "User"        => $this->user,
            "Password"    => $this->password,
            "CPCode"      => $this->cpCode,
            "ServiceID"   => $serviceID,

            "ReceiverID"  => $params['phone_number'],
            "UserID"      => $params['phone_number'],
            "RequestID"   => "3",
            "CommandCode" => "bulksms",
            "Content"     => $params['content'],
            "ContentType" => 0
        );

        $response = $this->client->wsCpMt($params);

        return [
            'status'  => $response->return->result, //0: Failed; 1: OK
//            'message' => $this->convertSendSmsMessage($response->return->message)
            'message' => $response->return->message
        ];
    }

    public function tryToSendMessage($params = null){
        $ip = $_SERVER['SERVER_ADDR'];
        if(!containString($ip, ['10.10.20.','192.','127.0']))
            return $this->sendMessage($params);

        $curl = new CurlService();
        $url = route('sms-service.send');

        for($i = 0; $i < 1; $i++){
            $response = $curl->to($url)
                ->withContentType('application/json')
                ->withHeaders([
                    'token:'.encrypt('SEND_SMS')
                ])
                ->withData($params)
                ->asJson(true)
                ->returnResponseObject()
                ->post();
            if($response->content['status'] == 1)
                return $response->content;
        }

        return [
            'status'    => 0,
            'message'   => 'IP sent not connected',
            'error_code'=> -1
        ];
    }

    /**
     * Chuyển đổi message trả về từ bắn tin nhắn để hiển thị thông báo
     * @param $message
     * @return string
     */
    public function convertSendSmsMessage($message)
    {
        $convertedMessage = '';
        switch ($message) {

        }

        return $convertedMessage;
    }

    /**
     * Kiểm tra số tiền hiện tại trong tài khoản
     * Status 1: Kiểm tra thành công; Số tiền còn dư trong key balance
     * Status 0: Kiểm tra thất bại; Lỗi nằm trong key message
     * @return mixed
     */
    public function checkBalance()
    {
        $params = [
            "User"     => $this->user,
            "Password" => $this->password,
            "CPCode"   => $this->cpCode
        ];

        $response = $this->client->checkBalance($params);

        $errCode = $response->return->errCode;
        $status = $errCode == 1 ? 0 : 1;

        return [
            'status'  => $status,
            'balance' => (integer)$response->return->balance,
            'message' => $this->convertCheckBalanceMessage($response->return->errDesc)
        ];

    }

    /**
     * Convert lại message được nhận về từ kiểm tra tài khoản
     * @param $message
     * @return string
     */
    public function convertCheckBalanceMessage($message)
    {

        switch ($message) {
            case "check balance success":
                $convertedMessage = "Kiểm tra tài khoản thành công";
                break;
            case "Authenticate: CP_CODE_NOT_FOUND":
                $convertedMessage = "Không tìm thấy mã CP Code";
                break;
            case "Authenticate: WRONG_INFORMATION_AUTHENTICATE" :
                $convertedMessage = "Thông tin đăng nhập không đúng. Kiểm tra lại user/password";
                break;
            default:
                $convertedMessage = $message;
        }

        return $convertedMessage;
    }

    /**
     * Lấy danh sách các tin nhắn bị lỗi
     * Params (case - sensitive):
     * alias: tên brandname
     * date: ngày muốn lấy tin nhắn lỗi format dd/MM/yyyy
     * pageNumber: trang số liệu (>0) mặc định là 1
     * pageSize: số bản ghi tối đa trên 1 trang (>0 và <=1000)
     * @param $alias
     * @param $date
     * @param int $pageNumber
     * @param int $pageSize
     */
    public function getFailedMessages($alias, $date, $pageNumber = 1, $pageSize = 100)
    {
        $params = [
            "User"       => $this->user,
            "Password"   => $this->password,
            "CPCode"     => $this->cpCode,
            "alias"      => $alias,
            "date"       => $date,
            "pageNumber" => $pageNumber,
            "pageSize"   => $pageSize
        ];

        $response = $this->client->getFailedSub($params);

    }

    /**
     * Chuyển đổi ký tự có dấu sang không dấu trong tin nhắn
     * @param $message
     * @return bool|mixed|string
     */
    public function convertMessageContent($message)
    {
        if (empty($message)) {
            return '';
        }

        $utf8 = array(
            'a'  => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'  => 'đ|Đ',
            'e'  => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'  => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'  => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'  => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'  => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            '\n' => ' '
        );

        foreach ($utf8 as $ascii => $uni) {
            $message = preg_replace("/($uni)/i", $ascii, $message);
        }

        return $this->convertSpecialCharacterInMessage($message);
    }

    /**
     * Xử lý các ký tự đặc biệt trong tin nhắn
     * @param  $message
     * @return mixed|string
     */
    protected function convertSpecialCharacterInMessage($message)
    {
        $message = str_replace("ß", "ss", $message);
        $message = str_replace("%", "", $message);
        $message = str_replace('  ', '', $message);
        $message = str_replace("----", "-", $message);
        $message = str_replace("---", "-", $message);
        $message = str_replace("--", "-", $message);
        $message = str_replace('\n', " ", $message);

        return $message;
    }
}