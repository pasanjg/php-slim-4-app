<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepository;

class InMemoryUserRepository implements UserRepository
{
    /**
     * @var User[]
     */
    private $users;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $users
     */
    public function __construct(array $users = null)
    {
        $this->users = $users ?? [
                1 => new User(1, 'bill.gates', 'Bill', 'Gates', "12345678"),
                2 => new User(2, 'steve.jobs', 'Steve', 'Jobs', "12345678"),
                3 => new User(3, 'mark.zuckerberg', 'Mark', 'Zuckerberg', "12345678"),
                4 => new User(4, 'evan.spiegel', 'Evan', 'Spiegel', "12345678"),
                5 => new User(5, 'jack.dorsey', 'Jack', 'Dorsey', "12345678"),
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAllUsers(): array
    {
        return array_values($this->users);
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): User
    {
        if (!isset($this->users[$id])) {
            throw new UserNotFoundException();
        }

        return $this->users[$id];
    }

    public function createUser(array $user)
    {

    }
}
