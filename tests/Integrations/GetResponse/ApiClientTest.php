<?php 

namespace RobertKomasara\RestClient\Tests\Integrations\GetResponse;

use RobertKomasara\RestClient\Tests\AppTestCase;
use RobertKomasara\RestClient\Integrations\GetResponse\ApiClient;

class ApiClientTest extends AppTestCase
{
    public function testInstance(): void
    {
        $apiClient = new ApiClient($this->apiCredentials['getResponse']['apiKey']);
        $this->assertSame($this->apiCredentials['getResponse']['apiKey'],$apiClient->getApiKey());
    }

    public function testRequests(): void
    {
        $apiClient = new ApiClient($this->apiCredentials['getResponse']['apiKey']);
        $this->assertNotEmpty($apiClient->getAccountExtendedInfo());
    }
}