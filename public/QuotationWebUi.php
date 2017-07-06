<?php

use Training\T03MessageSenderReceiver\SynchronizedList;

require_once __DIR__ . '/../vendor/autoload.php';

$synchronizedlist = new SynchronizedList();
$list = $synchronizedlist->getFirsts(5);
if (count($list) === 0)
{
    echo 'Empty list, run bash : <i>php ./bin/run.php \"\Training\T04UsingRoutingCapabilities\QuotationWebUi\"</i> ';
    die;
}

echo "<ul><li>";
echo implode('</li><li>', $list);
echo "</li></ul>";