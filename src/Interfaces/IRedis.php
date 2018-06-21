<?php

namespace FcPhp\Redis\Interfaces
{
	use Redis as RedisPHP;
	
	interface IRedis
	{
		public function __construct(RedisPHP $redis, string $host, string $port, string $password = null, int $timeout = 100);

		public function get(string $key);

		public function set(string $key, $content) :IRedis;

		public function delete(string $key) :IRedis;
	}
}