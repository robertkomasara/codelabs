<?php

namespace RobertKomasara\RestClient\Interfaces;

interface HttpEndpointInterface
{
    public function getRequestUrl(): string;

    public function getRequestMethod(): string;

    public function getRequestModelObject(): \stdClass;
}