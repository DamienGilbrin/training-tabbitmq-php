<?php

namespace Training\T03MessageSenderReceiver;


use Redis;

class SynchronizedList
{
    private $nodeKey;
    private $redis;

    public function __construct($nodeKey = 'data')
    {
        $this->redis = new Redis();
        $this->redis->connect("redis", 6379);
        $this->redis->setOption(Redis::OPT_SERIALIZER, Redis::SERIALIZER_PHP);
        $this->nodeKey = $nodeKey;
    }

    public function addElement($element)
    {
        $array = $this->getAll();
        array_unshift($array, $element);
        $this->redis->set($this->nodeKey, $array);
    }

    private function getAll(): array
    {
        $array = $this->redis->get($this->nodeKey);
        if (!is_array($array)) {
            $array = [];
        }
        return $array;
    }

    public function getFirsts(int $number): array
    {
        return array_slice($this->getAll(), 0, $number);
    }
}