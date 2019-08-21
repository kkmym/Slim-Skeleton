<?php

namespace MyApp\Infrastructure\Repositories;

use MyApp\Domain\Repositories\UserRepositoryInterface;
use MyApp\Domain\Entities\User;
use Psr\Container\ContainerInterface;
use PDO;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var $pdo PDO
     */
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
    ,user_name
)
VALUES (
    :disp_user_id
    ,:login_id
    ,:hashed_pw
    ,:user_name
)    
END_OF_SQL;

        $params['disp_user_id'] = $user->userDispUserId->value();
        $params['login_id'] = $user->userLoginId->value();
        $params['hashed_pw'] = $user->userHashedPw->value();
        $params['user_name'] = $user->userName;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $userId = $this->pdo->lastInsertID();

        return $userId;
    }
}
