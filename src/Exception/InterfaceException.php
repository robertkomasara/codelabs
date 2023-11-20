<?php

namespace RobertKomasara\RestClient\Exception;

use Exception;
use Throwable;

class InterfaceException extends Exception
{
    public function __construct(string $sourceClass, string $message = "", int $code = 0, Throwable $previous = null)
    {
        $msg = sprintf("Class %s is not an instance of %s", $sourceClass, $message);
        parent::__construct($msg, $code, $previous);
    }
}
