<?php

namespace Tests\MyApp\Domain\ValueObjects;

use Tests\TestCase;
use MyApp\Domain\ValueObjects\UserDispUserId;

class UserDispUserIdTest extends TestCase
{
    public function testInstanceOfLoginId()
    {
        $loginId = 'myLoginId';
        $userDispUserId = UserDispUserId::getInstanceOf($loginId);
        $this->assertRegExp('/^[a-f0-9]{64}$/', $userDispUserId->value());
    }

}