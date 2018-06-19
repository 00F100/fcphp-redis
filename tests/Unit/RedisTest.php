<?php

use FcPhp\Redis\Redis;
use FcPhp\Redis\Interfaces\IRedis;
use PHPUnit\Framework\TestCase;

class RedisTest extends TestCase
{
	public function setUp()
	{
		$redisInstance = $this->createMock('\Redis');
		$redisInstance
			->expects($this->any())
			->method('get')
			->will($this->returnCallback(function() {
				return 'value';
			}));

		$host = '127.0.0.1';
		$port = '6379';
		$password = 'pass';
		$timeout = 100;
		$this->instance = new Redis($redisInstance, $host, $port, $password, $timeout);
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