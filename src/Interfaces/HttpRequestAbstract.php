<?php

namespace RobertKomasara\RestClient\Interfaces;

use RobertKomasara\RestClient\Exception\HttpCurlException;

abstract class HttpRequestAbstract
{
    protected \CurlHandle $curl;

    public function __construct()
    {
        $this->curl = curl_init();
    }

    protected array $curlOptions = [
        CURLOPT_HEADER => 0, CURLOPT_RETURNTRANSFER => 1, 
        CURLOPT_CONNECTTIMEOUT => 1, CURLOPT_TIMEOUT => 1,
        CURLOPT_FOLLOWLOCATION => 1, CURLOPT_MAXREDIRS => 1,
        CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => 0,
    ];

    public abstract function setAuthMethod(): self;

    public function setOptions(int $key, int $val): void
    {
        $this->curlOptions[$key] = $val;   
    }

    public function sendRequest(string $url, array $data = [], string $method = 'GET'): array
    {
        $this->curlOptions[CURLOPT_URL] = $url;

        if ( sizeof($data) && in_array($method,['PUT','POST']) ) {
            $this->curlOptions[CURLOPT_POST] = true;
            $this->curlOptions[CURLOPT_POSTFIELDS] = json_encode($data);
        }

        curl_setopt_array($this->curl, $this->curlOptions);
        $response = curl_exec($this->curl);
        
        if( $errno = curl_errno($this->curl) ){
            throw new HttpCurlException($errno,curl_strerror($errno));
        }        
        
        $httpCode = curl_getinfo($this->curl,CURLINFO_HTTP_CODE);
        curl_close($this->curl);
    
        return [$response,$httpCode];
    }
}