<?php

namespace FcPhp\Redis\Interfaces
{
    use Redis as RedisPHP;
    
    interface IRedis
    {
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
        public function __construct(RedisPHP $redis, string $host, string $port, string $password = null, int $timeout = 100);

        /**
         * Method to return content by key in Redis server
         *
         * @param string $key Key of content
         * @return mixed
         */
        public function get(string $key);

        /**
         * Method to configure content by key in Redis server
         *
         * @param string $key Key of content
         * @param mixed $content Content to save on Redis
         * @return FcPhp\Redis\Interfaces\IRedis
         */
        public function set(string $key, $content) :IRedis;

        /**
         * Method to delete content
         *
         * @param string $key Key of content
         * @return FcPhp\Redis\Interfaces\IRedis
         */
        public function delete(string $key) :IRedis;

        /**
         * Method to return list of all keys
         *
         * @param string $key Key of content
         * @return array
         */
        public function keys(string $key);
    }
}
