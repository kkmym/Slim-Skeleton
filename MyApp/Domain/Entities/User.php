<?php

namespace MyApp\Domain\Entities;

use MyApp\Domain\ValueObjects\UserLoginId;
use MyApp\Domain\ValueObjects\UserHashedPw;
use MyApp\Domain\ValueObjects\UserDispUserId;
use MyApp\Domain\ValueObjects\UserName;

class User
{
    protected $userId;
    /* @var $dispUserid UserDispUserId */
    protected $userDispUserId;
    /* @var $loginId UserLoginId */
    protected $userLoginId;
    /* @var $hashedPw UserHashedPw */
    protected $userHashedPw;
    /* @var $userName UserName */
    protected $userName;
    protected $createdAt;
    protected $updatedAt;

    public static function getInstanceOfNewUser(string $loginId, string $rawPw, string $lastName, string $firstName)
    {
        $userDispUserId = UserDispUserId::getInstanceOf($loginId);
        $userLoginId = new UserLoginId($loginId);
        $userHashedPw = UserHashedPw::getInstanceOf($rawPw);
        $userName = new UserName($lastName, $firstName);

        $instance = new User();
        $instance->userDispUserId = $userDispUserId;
        $instance->userLoginId = $userLoginId;
        $instance->userHashedPw = $userHashedPw;
        $instance->userName = $userName;

        return $instance;
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
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
