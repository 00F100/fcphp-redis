<?php

namespace FcPhp\Redis
{
	use Redis as RedisPHP;
	use FcPhp\Redis\Interfaces\IRedis;

	class Redis implements IRedis
	{
		private $redis;

		private $host;

		private $port;

		private $username;

		private $password;

		private $timeout;

		private $connected = false;

		public function __construct(RedisPHP $redis, string $host, string $port, string $username = null, string $password = null, int $timeout = 100)
		{
			$this->redis = $redis;
			$this->host = $host;
			$this->port = $port;
			$this->username = $username;
			$this->password = $password;
			$this->timeout = $timeout;
		}

		private function connect() :void
		{
			$this->redis->connect($this->host, $this->port, $this->timeout);
		}

		private function checkConnect() :IRedis
		{
			if(!$this->connected) {
				$this->connect();
				$this->connected = true;
			}
			return $this;
		}

		public function get(string $key)
		{
			return $this
				->checkConnect()
				->redis
					->get($key);
		}

		public function set(string $key, $content) :IRedis
		{
			$this
				->checkConnect()
				->redis
					->set($key, $content);
			return $this;
		}
	}
}