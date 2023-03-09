<?php

declare(strict_types=1);

require_once __DIR__ . "/../Data/UserDAO2.php";
require_once __DIR__ . "/../Entities/User.php";


class UserService
{
    private UserDAO $userDAO;
    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    /**
     * Retrieve user from DB with credentials
     */
    public function loginUser($username, $password): ?User
    {
        return $this->userDAO->loginUser($username, $password);
    }

    public function registerUser($username, $email, $password) : int
    {
        return $this->userDAO->registerUser($username, $email, $password);
    }

    public function checkPassword($password, $rpassword) : void
    {
       if ($password !== $rpassword) {throw new WachtwoordenKomenNietOvereenException();
    }

}

}
