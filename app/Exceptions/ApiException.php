<?php
/**
 *File name : ApiException.php  / Date: 12/30/2021 - 6:35 PM
 *Code Owner: Tke / Phone: 0367313134 / Email: thedc.it.94@gmail.com
 */

namespace App\Exceptions;

use Exception;
use Throwable;

class ApiException extends Exception
{

    public $response;

    public function __construct($response, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->response = $response;
    }

}