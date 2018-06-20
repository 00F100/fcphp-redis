<?php

use FcPhp\Redis\Redis;
use FcPhp\Redis\Interfaces\IRedis;
use FcPhp\Redis\Facades\RedisFacade;
use PHPUnit\Framework\TestCase;
use Redis as RedisPHP;

class RedisIntegrationTest extends TestCase
{
	public function setUp()
	{
		$host = 'redis.docker';
		$port = '6379';
		$password = null;
		$timeout = 100;
		$this->instance = RedisFacade::getInstance($host, $port, $password, $timeout);
	}

	public function testInstance()
	{
		$this->assertTrue($this->instance instanceof IRedis);
	}

	public function testSet()
	{
		$this->instance->set('key', 'value');
		$this->assertEquals($this->instance->get('key'), 'value');
	}
}