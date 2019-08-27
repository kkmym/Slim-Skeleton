<?php

namespace Tests\MyApp\Infrastructure\Repositories;

use MyApp\Infrastructure\Repositories\UserRepository;
use Tests\TestCase;
use MyApp\Domain\Entities\User;

class UserRepositoryTest extends TestCase
{
    protected $storeLoginId = 'A02B506FFE9C468B8F0A34D0FA94063B';
    protected $storeRawPw = 'k5GyWbwK';

    public function testStoreUser()
    {
        $app = $this->getAppInstance();
        $container = $app->getContainer();
        $repo = $container->get(UserRepository::class);

        $user = User::getInstanceOfNewUser($this->storeLoginId, $this->storeRawPw, 'てすと', 'ゆーざー');
        $newId = $repo->store($user);

        $this->assertIsInt($newId);
        $this->assertGreaterThan(0, $newId);

        $user = $repo->findByLoginId($this->storeLoginId);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($user->userLoginId->value(), $this->storeLoginId);
        $this->assertTrue(password_verify($this->storeRawPw, $user->userHashedPw->value()));
    }

    protected function tearDown()
    {
        $app = $this->getAppInstance();
        $container = $app->getContainer();
        $pdo = $container->get('MysqlPdo');
        $sql = <<< END_OF_SQL
DELETE FROM users
WHERE login_id = '{$this->storeLoginId}'
END_OF_SQL;
        $pdo->exec($sql);
    }
}
