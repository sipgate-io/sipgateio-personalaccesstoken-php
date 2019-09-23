<?php

use Sipgate\Io\Example\BasicAuth\SipgateClient;

require_once __DIR__."/../vendor/autoload.php";

$username = "YOUR_SIPGATE_EMAIL";
$password = "YOUR_SIPGATE_PASSWORD";

$client = new SipgateClient($username, $password);

$response = $client->getAccountInfo();

echo "Status: ".$response->status();
echo "\n";
echo "Body: ".$response->body();
echo "\n";
