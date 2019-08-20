<?php

namespace MyApp\Domain\ValueObjects;

class UserHashedPw
{
    protected $hashedPw;

    public function __construct(string $hashedPw)
    {
        $this->hashedPw = $hashedPw;
    }

    public static function getInstanceOf(string $rawPw)
    {
        $hashedPw = password_hash($rawPw, PASSWORD_BCRYPT);
        if (!$hashedPw) {
            return null;
        }

        return new UserHashedPw($hashedPw);
    }

    public function value()
    {
        return $this->hashedPw;
    }
}
