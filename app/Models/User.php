<?php

declare(strict_types=1);

namespace App\Models;

final class User
{
    /** @var string */
    private $firstName;
    /** @var string */
    private $lastName;
    /** @var string */
    private $email;

    /**
     * User constructor.
     */
    public function __construct()
    {
    }

    public function serFirstName(string $firstName): void
    {
        $this->firstName = trim($firstName);
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function serLastName(string $lastName): void
    {
        $this->lastName = trim($lastName);
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function serEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmailVariables()
    {
        return [
            'fullname' => $this->getFullName(),
            'email' => $this->getEmail(),
        ];
    }

    public function getFullName(): string
    {
        return "$this->firstName $this->lastName";
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
