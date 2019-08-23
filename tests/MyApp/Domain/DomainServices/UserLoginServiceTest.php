<?php
use Tests\TestCase;
use MyApp\Domain\DomainServices\UserLoginService;

class UserLoginServiceTest extends TestCase
{
    public function testVerifyLoginIdAndPw()
    {
        $app = $this->getAppInstance();
        $container = $app->getContainer();
        $service = $container->make(UserLoginService::class);

        $verified = $service->verifyLoginIdAndPw('LoginID', 'Password');
        $this->assertTrue($verified);
    }
}
