<?php

namespace MyApp\Infrastructure\Repositories;

use MyApp\Domain\Repositories\UserRepositoryInterface;
use MyApp\Domain\Entities\User;
use Psr\Container\ContainerInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $pdo;

    public function __construct(ContainerInterface $container)
    {
        $this->pdo = $container->get('MysqlPdo');
    }

    public function store(User $user): int
    {
        $sql = <<< END_OF_SQL
INSERT INTO users (
    disp_user_id
    ,login_id
    ,hashed_pw
    ,last_name
    ,first_name
)
VALUES (
    :disp_user_id
    ,:login_id
    ,:hashed_pw
    ,:last_name
    ,:first_name
)    
END_OF_SQL;

        $params['disp_user_id'] = $user->userDispUserId->value();
        $params['login_id'] = $user->userLoginId->value();
        $params['hashed_pw'] = $user->userHashedPw->value();
        $params['last_name'] = $user->lastName;
        $params['first_name'] = $user->firstName;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $userId = $this->pdo->lastInsertID();

        return $userId;
    }
}
