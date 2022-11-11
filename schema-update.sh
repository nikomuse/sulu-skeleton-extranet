#!/bin/bash

cd `dirname $0`

php bin/console doctrine:schema:update --force
