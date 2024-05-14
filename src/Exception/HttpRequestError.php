<?php

namespace RobertKomasara\RestClient\Exception;

class HttpRequestError extends \Exception
{
    public function __construct(int $errno, string $message = "", int $code = 0, \Throwable $previous = null)
    {
        $msg = sprintf("curl request error %d: %s", $errno, $message);
        parent::__construct($msg, $code, $previous);
    }
}
