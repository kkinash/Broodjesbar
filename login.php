<?php

declare(strict_types=1);

require_once __DIR__ . "/Business/UserService2.php";
require_once __DIR__ . "/Exceptions/InvalidPasswordException.php";
require_once __DIR__ . "/Exceptions/UserNotFoundException.php";
require_once __DIR__ . "/presentation/header.php";

$error = "";
if (isset($_GET["action"]) && ($_GET["action"]) === "process") {
    $username = $_POST["username"];
    $password = $_POST['password'];
    

    $userService = new UserService();
    try {
        $userAccount = $userService->loginUser($username, $password);
        $_SESSION["userAccount"] = serialize($userAccount);
        $_SESSION["user"] = $username;
        $_SESSION["userid"] = $userAccount->getId();
        header("location: index.php");
		echo 'Hello, ' . $_SESSION["user"];
    } catch (UserNotFoundException $e) {
        $error = "Gebruiker kan niet gevonden worden in de database.";
    } catch (InvalidPasswordException $e) {
        $error = "Het passwoord is niet correct.";
    } catch (\Exception $e) {
        $error = "Onbekende fout: kan niet inloggen.";
    }
}


include_once 'Presentation/login2.php';
