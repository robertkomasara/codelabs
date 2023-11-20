<?php

namespace RobertKomasara\RestClient\Interfaces;

use RobertKomasara\RestClient\Exception\InterfaceException;
use RobertKomasara\RestClient\Interfaces\HttpEndpointInterface;

abstract class HttpEndpointAbstract
{
    protected object $apiClient;

    protected string $apiRequestUrl;

    protected string $apiRequestMethod;
    
    protected object $apiRequestModelObject;

    public function __construct()
    {
        if ( is_subclass_of(get_called_class(),HttpEndpointInterface::class) ){
           $this->setRequestUrl(); $this->setRequestMethod(); $this->setRequestModelObject();
        } else {
            throw new InterfaceException(get_called_class(),HttpEndpointInterface::class,500);
        }
    }

    public function sendRequest(): void
    {
        $response = $this->apiClient
        ->setUrl($this->apiRequestUrl)
        ->setPostData([
            'producer' => (array)$this->apiRequestModelObject])
        ->execute(); var_dump($response);
    }
}