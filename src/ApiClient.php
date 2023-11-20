<?php

namespace RobertKomasara\RestClient;

use RobertKomasara\RestClient\Interfaces\HttpAuthInterface;
use RobertKomasara\RestClient\Interfaces\HttpRequestAbstract;

class ApiClient extends HttpRequestAbstract implements HttpAuthInterface
{
    protected string $url;

    protected array $postData = [];

    public function __construct(
        public string $username = '', 
        public string $password = ''
    ){ 
        parent::__construct(); 
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function setPostData(array $data): self
    {
        $this->postData = $data;

        return $this;
    }

    public function setAuthMethod(): self
    {
        if ( mb_strlen($this->username) && mb_strlen($this->password) ){                        
            curl_setopt($this->curl,CURLOPT_USERPWD,$this->username.':'.$this->password);
        }

        return $this;
    }
    
    public function execute(string $method): array
    {
        list($response,$httpCode) = $this->setAuthMethod()->sendRequest($this->url,$this->postData,$method);

        return ['data' => $response,'code' => $httpCode];
    }
}