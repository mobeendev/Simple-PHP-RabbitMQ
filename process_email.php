<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();
$channel->queue_declare('mailq', false, false, false, false);
echo " [*] Waiting for messages. To exit press CTRL+C\n";
$send_mail = function ($msg) {

$payload = json_decode($msg->body);
echo '<br>';

print_r($payload->envelope);
echo '<br>';
print_r($payload->recipient);
echo '<br>';
echo "msg body:";
echo '<br>';
print_r($payload->mime);
echo '<br>';
 echo '----------------------------------------------\n\n';
};

$channel->basic_consume('mailq', '', false, true, false, false, $send_mail);
while (count($channel->callbacks)) {
    $channel->wait();
}
$channel->close();
$connection->close();