<?php
require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
use Twilio\Rest\Client;
$sid = 'AC200179a4a36135509ebc7d914dd5507c';
$token = '8cfc72b98760e3ce67e9bf3d88f0d1ab';
$client = new Client($sid, $token);
$client->messages->create(
    '+919618174291',
    [
        'from' => '+18587035859',
        'body' => "Your phone hacked!!! ur mobile in danger!!"
    ]
);

echo "message Sented Successfully!";
?>