<?php

namespace RobertKomasara\RestClient\Interfaces;

use RobertKomasara\RestClient\Exception\InterfaceException;
use RobertKomasara\RestClient\Interfaces\HttpEndpointInterface;

abstract class HttpEndpointAbstract
{
    protected object $apiClient;

    public function __construct()
    {
        if ( ! is_subclass_of(get_called_class(),HttpEndpointInterface::class) ){
            throw new InterfaceException(get_called_class(),HttpEndpointInterface::class,500);
        }
    }

    public function sendRequest(): void
    {
        $response = $this->apiClient
        ->setUrl($this->getRequestUrl())
        ->setPostData([
            'producer' => (array)$this->getRequestModelObject()
        ])
        ->execute($this->getRequestMethod()); var_dump($response);
    }
}