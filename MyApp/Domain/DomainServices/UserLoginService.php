<?php

namespace MyApp\Domain\DomainServices;

use MyApp\Infrastructure\Repositories\UserRepository;
use MyApp\Domain\DomainExceptions\EntityNotExistsException;

class UserLoginService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function verifyLoginIdAndPw(string $loginId, string $rawPw): bool
    {
        // ログインIDをキーにして users からレコード取得
        try {
            $user = $this->userRepo->findByLoginId($loginId);
        } catch (EntityNotExistsException $notExistsExp) {
            return false;
        }

        // 入力されたパスワードと突き合わせ
        if (!password_verify($rawPw, $user->userHashedPw->value())) {
            return false;
        }

        return true;
    }
}
