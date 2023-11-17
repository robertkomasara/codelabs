<?php

namespace RobertKomasara\RestClient\Examples;

use RobertKomasara\RestClient\ApiClient;

require '../../vendor/autoload.php';

$apiClient = new ApiClient($argv[1],$argv[2]);

$apiClient->setUrl('http://rekrutacja.localhost:8091/shop_api/v1/producers');
$response = $apiClient->execute();

var_dump($response);