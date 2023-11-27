<?php 

namespace RobertKomasara\RestClient\Tests;

use PHPUnit\Framework\TestCase;
use RobertKomasara\RestClient\ApiClient;

class SampleTest extends TestCase
{
    private ApiClient $apiClient;
    
    private array $apiCredentials;

    public function setUp(): void
    {
        global $apiCredentials; 

        $this->apiClient = new ApiClient(
            $apiCredentials['username'],
            $apiCredentials['password'],
        );

        $this->apiCredentials = $apiCredentials;
    }

    public function testAddRecord(): void
    {
        $postData = [
            'producer' => [
                "id" => strtotime('now'), "name" => "sampleName", "ordering" => 123,
                "logo_filename" => "sampleLogoFile.jpg", "site_url" => null, "source_id" => null
            ]
        ];
        
        $this->apiClient->setUrl($this->apiCredentials['endpoint'] . '/shop_api/v1/producers');
        $response = $this->apiClient->setPostData($postData)->execute('POST');
        $this->assertSame(200,$response['code']);
    }

    public function testListRecords(): void
    {
        $this->apiClient->setUrl($this->apiCredentials['endpoint'] . '/shop_api/v1/producers');
        $response = $this->apiClient->execute('GET');
        $this->assertSame(200,$response['code']);
    }
}