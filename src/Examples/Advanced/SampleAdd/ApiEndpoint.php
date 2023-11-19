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
        $this->setRequestUrl();
        $this->setRequestMethod();
        $this->setRequestModelObject();
    
        $this->apiClient = new ApiClient($username,$password);
    }

    public function sendRequest(): void
    {
        $response = $this->apiClient
        ->setUrl($this->apiRequestUrl)
        ->setPostData([
            'producer' => (array)$this->apiRequestModelObject])
        ->execute(); var_dump($response);
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
        $this->apiRequestModelObject->logo_filename = "blackhatfolks.jpg";
        $this->apiRequestModelObject->site_url = null;
        $this->apiRequestModelObject->source_id = null;

        return $this;
    }
}

$apiEndpoint = new ApiEndpoint($argv[1],$argv[2]);
$apiEndpoint->sendRequest();
