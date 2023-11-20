<?php 

namespace RobertKomasara\RestClient\Examples\Advance\SampleAdd;

use RobertKomasara\RestClient\ApiClient;
use RobertKomasara\RestClient\Interfaces\HttpEndpointAbstract;
use RobertKomasara\RestClient\Interfaces\HttpEndpointInterface;

require '../../../../vendor/autoload.php';

class ApiEndpoint extends HttpEndpointAbstract implements HttpEndpointInterface
{
    public function __construct(string $username,string $password)
    {
        $this->apiClient = new ApiClient($username,$password); 
        parent::__construct();
    }

    public function getRequestUrl(): string
    {
        return 'http://rekrutacja.localhost:8091/shop_api/v1/producers';
    }

    public function getRequestMethod(): string
    {
        return 'POST';
    }

    public function getRequestModelObject(): \stdClass
    {
        $obj = new \stdClass();   
        $obj->id = random_int(1111,9999);
        $obj->name = "ApiEndpointSampleAdd";
        $obj->ordering = random_int(1111,9999);
        $obj->logo_filename = "cybersecurity.jpg";
        $obj->site_url = 'https://redops.pl';
        $obj->source_id = null;

        return $obj;
    }
}

$apiEndpoint = new ApiEndpoint($argv[1],$argv[2]);
$apiEndpoint->sendRequest();
