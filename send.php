<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');

for($i= 0 ; $i<100000; $i++){
    echo $i . '\t';
    $channel = $connection->channel();
    $channel->queue_declare('test_queue', false, false, false, false);
    $msg = new AMQPMessage("Sending Email to mobeen! $i");
    $channel->basic_publish($msg, '', 'test_queue');
    echo " [x] Sent 'Abdul Mobeen to Queue!'\n";
    $channel->close();
}

$connection->close();