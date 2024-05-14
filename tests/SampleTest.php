<?php 

namespace RobertKomasara\RestClient\Tests;

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    private array $apiCredentials;

    public function setUp(): void
    {
        global $apiCredentials; 

        $this->apiCredentials = $apiCredentials;
    }

    public function testResponse(): void
    {
        $this->assertSame(200,200);
    }
}