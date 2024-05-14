#!/bin/bash

set -euo pipefail;

./vendor/phpunit/phpunit/phpunit --verbose --bootstrap tests/Bootstrap.php tests