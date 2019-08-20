<?php

namespace MyApp\Domain\Entities;

use MyApp\Domain\ValueObjects\UserLoginId;
use MyApp\Domain\ValueObjects\UserHashedPw;
use MyApp\Domain\ValueObjects\UserDispUserId;

class User
{
    protected $userId;
    /* @var $dispUserid UserDispUserId */
    protected $dispUserId;
    /* @var $loginId UserLoginId */
    protected $loginId;
    /* @var $hashedPw UserHashedPw */
    protected $hashedPw;
    protected $userName;
    protected $createdAt;
    protected $updatedAt;

    public static function getInstanceOfNewUser(string $loginId, string $rawPw, string $userName)
    {
        $userDispUserId = UserDispUserId::getInstanceOf($loginId);
        $userLoginId = new UserLoginId($loginId);
        $userHashedPw = UserHashedPw::getInstanceOf($rawPw);

        $instance = new User();
        $instance->dispUserId = $userDispUserId;
        $instance->loginId = $userLoginId;
        $instance->hashedPw = $userHashedPw;
        $instance->userName = $userName;

        return $instance;
    }

    public function __set($name, $value)
    {
        if (isset($this->$name)) {
            $this->$name = $value;
        }
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }
    }
}
