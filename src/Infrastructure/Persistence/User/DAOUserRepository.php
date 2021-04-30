<?php

namespace App\Infrastructure\Persistence\User;

use PDO;
use App\Domain\User\User;
use App\Domain\User\UserRepository;
use App\Domain\User\UserNotFoundException;

class DAOUserRepository implements UserRepository
{

    protected $connection;

    /**
     * DAOUserRepository constructor.
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param array $user The user
     */
    public function createUser(array $user)
    {
        $row = [
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'username' => $user['username'],
            'password' => $user['password'],
        ];

        $sql = "INSERT INTO users SET 
                firstname=:firstname, 
                lastname=:lastname, 
                username=:username, 
                password=:password;";

        $query = $this->connection->prepare($sql);
        $query->execute($row);
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function findAllUsers(): array
    {
        $query = $this->connection->prepare("SELECT * FROM users");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * {@inheritdoc}
     * @param int $id
     * @return User
     */
    public function findUserOfId(int $id): User
    {
        // TODO: Implement findUserOfId() method.
    }
}
