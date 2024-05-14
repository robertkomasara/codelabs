<?php

namespace RobertKomasara\RestClient\Integrations\GetResponse;

use RobertKomasara\RestClient\Interfaces\HttpRequestAbstract;

class ApiClient extends HttpRequestAbstract
{
    const API_URL = 'https://api.getresponse.com/v3';

    public function __construct(public string $apiKey)
    {
         parent::__construct();
         
         $this->setHeaders([
            sprintf('Content-Type: application/json'),
            sprintf('X-Auth-Token: api-key %s',[$apiKey])
        ]);
    }

    public function getAccountExtendedInfo(): array
    {
        $endpoints = ['/accounts','/accounts/billing','/accounts/login-history'];

        foreach( $endpoints as $endpoint ){
            list($response,$httpCode) = $this->sendRequest( self::API_URL . $endpoint );
            if ( $httpCode == 200 ) $account[] = json_decode($response);
        }

        return $account;
    }
}