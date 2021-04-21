<?php

namespace Sipgate\Io\Example\BasicAuth;

use Zttp\Zttp;
use Zttp\ZttpResponse;

class SipgateClient
{
    protected static $BASE_URL = "https://api.sipgate.com/v2";

    protected $tokenId;
    protected $token;

    public function __construct(string $tokenId, string $token)
    {
        $this->tokenId = $tokenId;
        $this->token = $token;
    }

    public function getAccountInfo(): ZttpResponse
    {
        return $this->send();
    }

    protected function send(): ZttpResponse
    {
        return Zttp::withHeaders([
                "Accept" => "application/json",
                "Content-Type" => "application/json"
            ])
            ->withBasicAuth($this->tokenId, $this->token)
            ->get(self::$BASE_URL."/account");
    }
}
