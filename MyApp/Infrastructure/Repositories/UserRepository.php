<?php

namespace MyApp\Infrastructure\Repositories;

use MyApp\Domain\Repositories\UserRepositoryInterface;
use MyApp\Domain\Entities\User;
use Psr\Container\ContainerInterface;
use MyApp\Domain\DomainExceptions\EntityNotExistsException;
use MyApp\Domain\ValueObjects\UserDispUserId;
use MyApp\Domain\ValueObjects\UserLoginId;
use MyApp\Domain\ValueObjects\UserHashedPw;
use MyApp\Domain\ValueObjects\UserName;

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
        $params['last_name'] = $user->userName->lastName;
        $params['first_name'] = $user->userName->firstName;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $userId = $this->pdo->lastInsertID();

        return $userId;
    }

    public function findByLoginId(string $loginId): User
    {
        $sql = <<< END_OF_SQL
SELECT
    user_id
    ,disp_user_id
    ,login_id
    ,hashed_pw
    ,last_name
    ,first_name
FROM users
WHERE
    login_id = :login_id
LIMIT 1
END_OF_SQL;

        $params['login_id'] = $loginId;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$result) {
            throw new EntityNotExistsException();
        }

        /** @var User $user */
        $user = new User();
        $user->userId = $result['user_id'];
        $user->userDispUserId = new UserDispUserId($result['disp_user_id']);
        $user->userLoginId = new UserLoginId($result['login_id']);
        $user->userHashedPw = new UserHashedPw($result['hashed_pw']);
        $user->userName = new UserName($result['last_name'], $result['first_name']);

        return $user;
    }
}
