<?php

namespace App\Exceptions;

class ExternalRequestException extends \Exception
{


    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
