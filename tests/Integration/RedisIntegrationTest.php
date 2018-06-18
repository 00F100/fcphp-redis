<?php

use FcPhp\Redis\Redis;
use FcPhp\Redis\Interfaces\IRedis;
use PHPUnit\Framework\TestCase;
use Redis as RedisPHP;

class RedisIntegrationTest extends TestCase
{
	public function setUp()
	{
		$host = '127.0.0.1';
		$port = '6379';
		$username = 'user';
		$password = 'pass';
		$timeout = 100;
		$this->instance = new Redis(new RedisPHP(), $host, $port, $username, $password, $timeout);
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