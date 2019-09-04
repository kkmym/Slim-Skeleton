<?php

namespace MyApp\Domain\ValueObjects;

use MyApp\Domain\DomainExceptions\InvalidTypeException;
use MyApp\Domain\Validator\UserRawPwValidator;

class UserHashedPw
{
    protected $hashedPw;

    public function __construct(string $hashedPw)
    {
        $this->hashedPw = $hashedPw;
    }

    public static function getInstanceOf(string $rawPw)
    {
        if (!self::_validateRawPw($rawPw)) {
            throw new InvalidTypeException();
        }

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

    public function verifyRawPw(string $rawPw)
    {
        return password_verify($rawPw, $this->hashedPw);
    }

    protected static function _validateRawPw(string $rawPw) : bool
    {
        $validator = new UserRawPwValidator();
        return $validator->validate($rawPw);
    }
}
