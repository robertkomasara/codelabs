<?php

namespace RobertKomasara\RestClient\Tests;

use PHPUnit\Framework\TestCase;

class AppTestCase extends TestCase
{
    protected array $apiCredentials = [];

    public function setUp(): void
    {
        $apiIniFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'api.ini';

        if ( file_exists( $apiIniFilePath ) ){
            $this->apiCredentials = parse_ini_file($apiIniFilePath,true);
        }
    }
}