<?php

namespace RobertKomasara\RestClient\Examples;

use RobertKomasara\RestClient\ApiClient;

require '../../vendor/autoload.php';

$apiClient = new ApiClient($argv[1],$argv[2]);

$postData = [
    'producer' => [
        "id" => random_int(1111,9999),
        "name" => "rktest", "ordering" => 123,
        "logo_filename" => "blackhatfolks.jpg",
        "site_url" =>  null, "source_id" => null
    ]
];

$apiClient->setUrl('http://rekrutacja.localhost:8091/shop_api/v1/producers');
$response = $apiClient->setPostData($postData)->execute();

var_dump($response);