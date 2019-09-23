<?php

namespace Sipgate\Io\Example\BasicAuth;

use Zttp\Zttp;
use Zttp\ZttpResponse;

class SipgateClient
{
    protected static $BASE_URL = "https://api.sipgate.com/v2";

    protected $username;
    protected $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
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
            ->withBasicAuth($this->username, $this->password)
            ->get(self::$BASE_URL."/account");
    }
}
