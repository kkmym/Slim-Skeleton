<?php

namespace MyApp\Domain\Repositories;

use MyApp\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function store(User $user): int;
    // public function findById(int $userId): User;
    public function findByLoginId(string $loginId): User;
}