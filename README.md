# FcPhp Redis

Package to manage Redis

[![Build Status](https://travis-ci.org/00F100/fcphp-redis.svg?branch=master)](https://travis-ci.org/00F100/fcphp-redis) [![codecov](https://codecov.io/gh/00F100/fcphp-redis/branch/master/graph/badge.svg)](https://codecov.io/gh/00F100/fcphp-redis) [![Total Downloads](https://poser.pugx.org/00F100/fcphp-redis/downloads)](https://packagist.org/packages/00F100/fcphp-redis)

## How to install

Composer:
```sh
$ composer require 00f100/fcphp-redis
```

or add in composer.json
```json
{
	"require": {
		"00f100/fcphp-redis": "*"
	}
}
```

## How to use

```php
<?php

/**
 * Method to construct instance of Redis
 *
 * @param string $host Host to connect Redis server
 * @param string $port Port of Redis server
 * @param string $password Password of Redis server
 * @param int $timeout Timeout of try connect
 * @return void
 */
$redis = RedisFacade::getInstance(string $host, string $port, string $password = null, int $timeout = 100);

```

## Example

```php
<?php

use FcPhp\Redis\Facades\RedisFacade;

$redis = RedisFacade::getInstance('127.0.0.1', '6379', null, 100);

$redis->set('key', 'content');

echo $redis->get('key');
// Print: content

```