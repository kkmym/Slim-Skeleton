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
        $userName = 'Dummy User';
        $newUser = User::getInstanceOfNewUser($loginId, $rawPw, $userName);

        $this->assertInstanceOf(UserDispUserId::class, $newUser->dispUserId);
        $this->assertNull($newUser->userId);
    }
}