<?php
declare(strict_types=1);

namespace App\Domain\User;

interface UserRepository
{

    /**
     * @param array $user
     * @return mixed
     */
    public function createUser(array $user);

    /**
     * @return User[]
     */
    public function findAllUsers(): array;

    /**
     * @param int $id
     * @return User
     * @throws UserNotFoundException
     */
    public function findUserOfId(int $id): User;
}
