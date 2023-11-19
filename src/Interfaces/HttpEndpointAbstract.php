<?php

namespace RobertKomasara\RestClient\Interfaces;

use RobertKomasara\RestClient\Exception\HttpCurlException;

abstract class HttpEndpointAbstract
{
    public object $apiClient;

    public string $apiRequestUrl;

    public string $apiRequestMethod;
    
    public object $apiRequestModelObject;
}