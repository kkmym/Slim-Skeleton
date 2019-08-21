<?php

namespace MyApp\Domain\Entities;

use MyApp\Domain\ValueObjects\UserLoginId;
use MyApp\Domain\ValueObjects\UserHashedPw;
use MyApp\Domain\ValueObjects\UserDispUserId;

class User
{
    protected $userId;
    /* @var $dispUserid UserDispUserId */
    protected $userDispUserId;
    /* @var $loginId UserLoginId */
    protected $userLoginId;
    /* @var $hashedPw UserHashedPw */
    protected $userHashedPw;
    protected $userName;
    protected $createdAt;
    protected $updatedAt;

    public static function getInstanceOfNewUser(string $loginId, string $rawPw, string $userName)
    {
        $userDispUserId = UserDispUserId::getInstanceOf($loginId);
        $userLoginId = new UserLoginId($loginId);
        $userHashedPw = UserHashedPw::getInstanceOf($rawPw);

        $instance = new User();
        $instance->userDispUserId = $userDispUserId;
        $instance->userLoginId = $userLoginId;
        $instance->userHashedPw = $userHashedPw;
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
