<?php

namespace Tests\MyApp\Domain\Entities;

use Tests\TestCase;
use MyApp\Domain\Entities\User;
use MyApp\Domain\ValueObjects\UserDispUserId;

class UserTest extends TestCase
{
    public function testIncetanceOfNewUser()
    {
        $loginId = 'newLoginId';
        $rawPw = 'newPassword';
        $lastName = 'Dummy';
        $firstName = 'User';
        $newUser = User::getInstanceOfNewUser($loginId, $rawPw, $lastName, $firstName);

        $this->assertNull($newUser->userId);
        $this->assertInstanceOf(UserDispUserId::class, $newUser->userDispUserId);
    }
}
