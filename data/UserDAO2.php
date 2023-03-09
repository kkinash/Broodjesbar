<?php

declare(strict_types=1);


require_once("DBConfig.php");
require_once __DIR__ . "/../Entities/User.php";
require_once __DIR__ . "/../Exceptions/InvalidPasswordException.php";
require_once __DIR__ . "/../Exceptions/UserNotFoundException.php";
require_once __DIR__ . "/../Exceptions/emailReedsInGebruikException.php";

class UserDAO
{
    /**
     * returns an object of user from the DB, if it exists and the password is correct.
     */
    public function loginUser(string $username, string $password): ?User
    {  
        try {
			$dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :username");

            $stmt->bindValue(":username", $username);
            $stmt->execute();
            $resultSet = $stmt->fetch(\PDO::FETCH_ASSOC);

			if (!$resultSet) {
                throw new UserNotFoundException();
            }

            $isWachtwoordCorrect = password_verify($password, $resultSet["Wachtwoord"]);

            if (!$isWachtwoordCorrect) {
                throw new InvalidPasswordException();
            }

            $user = new User(
                (int)$resultSet["Personid"],
                $resultSet["Name"],
				$resultSet["Email"],
                $resultSet["Wachtwoord"]
            );
            $dbh = null;
            
            return $user;
           
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return null;
    }


    public function emailReedsInGebruik($email): int
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    }


    public function registerUser(string $email, string $password): int
    {
        $rowCount = $this->emailReedsInGebruik($email);
        if ($rowCount > 0) {
           throw new emailReedsInGebruikException();
        }

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("INSERT INTO users (name, email, wachtwoord) VALUES (:name, :email, :wachtwoord)");
        $stmt->bindValue(":name", $username);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":wachtwoord", $password);
        $stmt->execute();
        $laatsteNieuweId = $dbh->lastInsertId();
        $dbh = null;
        $id = $laatsteNieuweId;
        return (int) $id;


    }


}
