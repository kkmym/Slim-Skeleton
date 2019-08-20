<?php

namespace Tests\MyApp\Domain\ValueObjects;

use Tests\TestCase;
use MyApp\Domain\ValueObjects\UserLoginId;
use MyApp\Domain\DomainExceptions\InvalidTypeException;

class UserLoginIdTest extends TestCase
{
    public function testInvalidParameter1()
    {
        $this->expectException(InvalidTypeException::class);
        $loginId1 = '123';
        $instance1 = new UserLoginId($loginId1);
    }

    public function testInvalidParameter2()
    {
        $this->expectException(InvalidTypeException::class);
        $loginId2 = '123456789012345678901234567890123';
        $instance2 = new UserLoginId($loginId2);
    }

    public function testInvalidParameter3()
    {
        $this->expectException(InvalidTypeException::class);
        $loginId3 = 'pw%pw';
        $instance3 = new UserLoginId($loginId3);
    }

    public function testValidParameter1()
    {
        $loginId = '1234abYZ';
        $userLoginId = new UserLoginId($loginId);
        $this->assertEquals($loginId, $userLoginId->value());
    }
}
