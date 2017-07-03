<?php
require_once __DIR__ . '/../vendor/autoload.php';

if (count($argv) != 2)
{
    throw new InvalidArgumentException('First parameter must be a class name with namespace');
}

$myClass = $argv[1];

if (!class_exists($myClass))
{
    throw new InvalidArgumentException('Class not exists');
}

(new $myClass())();