<?php

use Sipgate\Io\Example\PersonalAccessToken\SipgateClient;

require_once __DIR__."/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/..");
$dotenv->load();

$tokenId = $_ENV['TOKEN_ID'];
$token = $_ENV['TOKEN'];

$client = new SipgateClient($tokenId, $token);

$response = $client->getAccountInfo();

echo "Status: ".$response->status();
echo "\n";
echo "Body: ".$response->body();
echo "\n";
