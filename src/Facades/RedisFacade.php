<?php

namespace FcPhp\Redis\Facades
{
	use Redis as RedisPHP;
	use FcPhp\Redis\Redis;
	use FcPhp\Redis\Interfaces\IRedis;

	class RedisFacade
	{
		private static $instance;

		public static function getInstance(string $host, string $port, string $password = null, int $timeout = 100)
		{
			if(!self::$instance instanceof IRedis) {
				self::$instance = new Redis(new RedisPHP(), $host, $port, $password, $timeout);
			}
			return self::$instance;
		}
	}
}