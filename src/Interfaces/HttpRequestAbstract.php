<?php

namespace RobertKomasara\RestClient\Interfaces;

use RobertKomasara\RestClient\Exceptions\HttpRequestError;

abstract class HttpRequestAbstract
{
    protected \CurlHandle $curl;

    protected array $curlOptions = [
        CURLOPT_HEADER => 0, CURLOPT_RETURNTRANSFER => 1, 
        CURLOPT_CONNECTTIMEOUT => 1, CURLOPT_TIMEOUT => 1,
        CURLOPT_FOLLOWLOCATION => 1, CURLOPT_MAXREDIRS => 1,
        CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => 0,
    ];

    public function __construct()
    {
        $this->curl = curl_init();
    }

    public function setMethod(string $method): void
    {
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);
    }

    public function setHeaders(array $headers = []): void
    {
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
    }

    public function sendRequest(string $url, string $data = ''): array
    {
        $this->curlOptions[CURLOPT_URL] = $url;

        if( strlen($data) ){
            $this->curlOptions[CURLOPT_POST] = true;
            $this->curlOptions[CURLOPT_POSTFIELDS] = $data;
        }

        curl_setopt_array($this->curl, $this->curlOptions);
        $response = curl_exec($this->curl);
        
        if( $errno = curl_errno($this->curl) ){
            throw new HttpRequestError($errno, curl_strerror($errno));
        }        
        
        $httpCode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        curl_close($this->curl);
    
        return [$response,$httpCode];
    }
}