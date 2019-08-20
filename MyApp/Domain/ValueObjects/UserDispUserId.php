<?php

namespace MyApp\Domain\ValueObjects;

class UserDispUserId
{
    protected $dispUserId;

    public function __construct(string $dispUserId)
    {
        $this->dispUserId = $dispUserId;
    }

    public static function getInstanceOf(string $loginId)
    {
        $ms = microtime();
        $dispUserId = hash('sha256', $loginId . $ms);
        return new UserDispUserId($dispUserId);
    }

    public function value()
    {
        return $this->dispUserId;
    }
}
