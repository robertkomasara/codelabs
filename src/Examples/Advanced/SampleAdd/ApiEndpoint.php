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
        $this->apiClient = new ApiClient($username,$password); parent::__construct();
    }

    public function setRequestUrl(): HttpEndpointInterface
    {
        $this->apiRequestUrl = 'http://rekrutacja.localhost:8091/shop_api/v1/producers';

        return $this;
    }

    public function setRequestMethod(): HttpEndpointInterface
    {
        $this->apiRequestMethod = 'POST';

        return $this;
    }

    public function setRequestModelObject(): HttpEndpointInterface
    {
        $this->apiRequestModelObject = new \stdClass();   
        $this->apiRequestModelObject->id = random_int(1111,9999);
        $this->apiRequestModelObject->name = "EndpointModelSampleAdd";
        $this->apiRequestModelObject->ordering = random_int(1111,9999);
        $this->apiRequestModelObject->logo_filename = "cybersecurity.jpg";
        $this->apiRequestModelObject->site_url = 'https://redops.pl';
        $this->apiRequestModelObject->source_id = null;

        return $this;
    }
}

$apiEndpoint = new ApiEndpoint($argv[1],$argv[2]);
$apiEndpoint->sendRequest();
