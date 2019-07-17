<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();
$channel->queue_declare('mailq', false, false, false, false);

$recipientDomain = 'example.org';      // domain where the test message should be delivered
$recipientEmail  = 'info@example.org'; // email where the test message should be delivered
$fromAddress     = 'me@my-domain.com'; // address where the email was sent from

// JSON encoded message to put on the queue
// JSON encoded message to put on the queue
$msg = json_encode(array(
    'envelope' => 'abdul',
    'recipient' => 'jhon@doe.com',
    'mime' => "From: " . 'mailer@gmail.com' . "\r\n"
            . "To: " . 'mobeen123@rocketmail.com'. "\r\n"
            . "Subject: Example subject\r\n\r\n"
            . "This is the example message text"
));

$jsonMessage = new AMQPMessage($msg, array('delivery_mode' => 1, 'content_type' => 'application/json'));

$channel->basic_publish($jsonMessage, '', 'mailq');
echo " [x] Sent ' to MailQueue ....!'\n";
$channel->close();
$connection->close();
