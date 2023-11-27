#!/bin/bash

set -euo pipefail;

export ApiEndpoint=$1;
export ApiUsername=$2;
export ApiPassword=$3;

./vendor/phpunit/phpunit/phpunit --verbose --bootstrap tests/Bootstrap.php tests