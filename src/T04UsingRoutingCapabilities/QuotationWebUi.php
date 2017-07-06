<?php

namespace Training\T04UsingRoutingCapabilities;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Training\Quotations\QuotationService;
use Training\T03MessageSenderReceiver\SynchronizedList;

class QuotationWebUi
{
    private $quotationService;
    private $queue = 'webui';
    private $synchronizedList;

    public function __construct()
    {
        $this->quotationService = new QuotationService();
        $this->synchronizedList = new SynchronizedList();
    }

    public function __invoke()
    {
        echo "Running consumer, run http://localhost:8085/QuotationWebUi.php".PHP_EOL;

        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->queue_declare($this->queue);
        $channel->queue_purge($this->queue);
        $channel->queue_bind($this->queue, "quotations");

        $channel->basic_consume(
            $this->queue,
            '',
            false,
            false,
            false,
            false,
            function () {
                call_user_func_array([$this, 'processMessage'], func_get_args());
            });


        while(count($channel->callbacks)) {
            $channel->wait();
        }
    }

    private function processMessage(AMQPMessage $message)
    {
        $body = $message->getBody();
        echo "Receive message : ".$body.PHP_EOL;
        $this->synchronizedList->addElement($body);
    }
}