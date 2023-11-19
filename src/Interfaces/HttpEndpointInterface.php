<?php

namespace RobertKomasara\RestClient\Interfaces;

interface HttpEndpointInterface
{
    public function setRequestUrl(): self;

    public function setRequestMethod(): self;

    public function setRequestModelObject(): self;
}