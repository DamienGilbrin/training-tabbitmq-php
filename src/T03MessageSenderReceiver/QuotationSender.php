<?php

namespace Training\T03MessageSenderReceiver;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Training\Quotations\QuotationService;

class QuotationSender
{
    private $quotationService;

    public function __construct()
    {
        $this->quotationService = new QuotationService();
    }

    public function __invoke()
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        while (true) {
            sleep(1);
            $quotationString = $this->quotationService->next();
            $message = new AMQPMessage($quotationString);
            $channel->basic_publish($message, "quotations", "nasq");

            echo "send this message : " . $quotationString . PHP_EOL;
        }
    }
}