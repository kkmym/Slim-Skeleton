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
    }
}

