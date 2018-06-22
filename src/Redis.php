<?php

namespace FcPhp\Redis
{
	use Redis as RedisPHP;
	use FcPhp\Redis\Interfaces\IRedis;

	class Redis implements IRedis
	{
		/**
		 * @var \Redis
		 */
		private $redis;

		/**
		 * @var string
		 */
		private $host;

		/**
		 * @var string
		 */
		private $port;

		/**
		 * @var string
		 */
		private $password;

		/**
		 * @var int
		 */
		private $timeout;

		/**
		 * @var bool
		 */
		private $connected = false;

		/**
		 * Method to construct instance of Redis
		 *
		 * @param \Redis $redis Redis instance
		 * @param string $host Host to connect Redis server
		 * @param string $port Port of Redis server
		 * @param string $password Password of Redis server
		 * @param int $timeout Timeout of try connect
		 * @return void
		 */
		public function __construct(RedisPHP $redis, string $host, string $port, string $password = null, int $timeout = 100)
		{
			$this->redis = $redis;
			$this->host = $host;
			$this->port = $port;
			$this->password = $password;
			$this->timeout = $timeout;
		}

		/**
		 * Method to connect on Redis server
		 *
		 * @return void
		 */
		private function connect() :void
		{
			$this->redis->connect($this->host, $this->port, $this->timeout);
			if(!empty($this->password)) {
				$this->redis->auth($this->password);
			}
		}

		/**
		 * Method to check if Redis has connected
		 *
		 * @return FcPhp\Redis\Interfaces\IRedis
		 */
		private function checkConnect() :IRedis
		{
			if(!$this->connected) {
				$this->connect();
				$this->connected = true;
			}
			return $this;
		}

		/**
		 * Method to return content by key in Redis server
		 *
		 * @param string $key Key of content
		 * @return mixed
		 */
		public function get(string $key)
		{
			return $this
				->checkConnect()
				->redis
					->get($key);
		}

		/**
		 * Method to configure content by key in Redis server
		 *
		 * @param string $key Key of content
		 * @param mixed $content Content to save on Redis
		 * @return FcPhp\Redis\Interfaces\IRedis
		 */
		public function set(string $key, $content) :IRedis
		{
			$this
				->checkConnect()
				->redis
					->set($key, $content);
			return $this;
		}

		/**
		 * Method to delete content
		 *
		 * @param string $key Key of content
		 * @return FcPhp\Redis\Interfaces\IRedis
		 */
		public function delete(string $key) :IRedis
		{
			$this
				->checkConnect()
				->redis
					->delete($key);
			return $this;
		}

		/**
		 * Method to return list of all keys
		 *
		 * @param string $key Key of content
		 * @return array
		 */
		public function keys(string $key)
		{
			return $this
				->checkConnect()
				->redis
					->keys($key);
		}
	}
}