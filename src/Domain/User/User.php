<?php
declare(strict_types=1);

namespace App\Domain\User;

use JsonSerializable;

class User implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @param int|null  $id
     * @param string    $username
     * @param string    $firstname
     * @param string    $lastname
     * @param string    $password
     */
    public function __construct(?int $id, string $username, string $firstname, string $lastname, string $password)
    {
        $this->id = $id;
        $this->username = strtolower($username);
        $this->firstname = ucfirst($firstname);
        $this->lastname = ucfirst($lastname);
        $this->password = $password;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'firstName' => $this->firstname,
            'lastName' => $this->lastname,
            'password' => $this->password,
        ];
    }
}
