<?php

namespace Tests\MyApp\Infrastructure\Repositories;

use MyApp\Infrastructure\Repositories\UserRepository;
use Tests\TestCase;
use MyApp\Domain\Entities\User;

class UserRepositoryTest extends TestCase
{
    public function testStoreUser()
    {
        $app = $this->getAppInstance();
        $container = $app->getContainer();
        $repo = $container->get(UserRepository::class);

        $user = User::getInstanceOfNewUser('LoginID', 'Password', 'てすと', 'ゆーざー');
        $newId = $repo->store($user);

        $this->assertIsInt($newId);
        $this->assertGreaterThan(0, $newId);

        $loginId = 'LoginID';
        $user = $repo->findByLoginId($loginId);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($user->userLoginId->value(), $loginId);
        $this->assertTrue(password_verify('Password', $user->userHashedPw->value()));
    }

    protected function tearDown()
    {
        $app = $this->getAppInstance();
        $container = $app->getContainer();
        $pdo = $container->get('MysqlPdo');
        $sql = <<< END_OF_SQL
TRUNCATE TABLE users;
END_OF_SQL;
        $pdo->exec($sql);
    }
}
