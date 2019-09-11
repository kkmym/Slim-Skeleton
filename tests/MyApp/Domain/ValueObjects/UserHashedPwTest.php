<?php

namespace Tests\MyApp\Domain\ValueObjects;

use MyApp\Domain\ValueObjects\UserHashedPw;
use Tests\TestCase;

class UserHashedPwTest extends TestCase
{
    public function testInstanceOfRawPw()
    {
        $rawPw = 'newPasSW0rd';
        $userHashedPw = UserHashedPw::getInstanceOf($rawPw);
        $verify = password_verify($rawPw, $userHashedPw->value());
        $this->assertTrue($verify);
    }
}
