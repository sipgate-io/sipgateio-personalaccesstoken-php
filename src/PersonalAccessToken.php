<?php

use Sipgate\Io\Example\BasicAuth\SipgateClient;

require_once __DIR__."/../vendor/autoload.php";

$tokenId = "YOUR_SIPGATE_EMAIL";
$token = "YOUR_SIPGATE_PASSWORD";

$client = new SipgateClient($tokenId, $token);

$response = $client->getAccountInfo();

echo "Status: ".$response->status();
echo "\n";
echo "Body: ".$response->body();
echo "\n";
