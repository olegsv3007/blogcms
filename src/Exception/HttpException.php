<?php

namespace App\Exception;

class HttpException extends \Exception
{
    public function setCode($code)
    {
        $this->code = $code;
    }
}