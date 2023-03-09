<?php

// signup.php

declare(strict_types=1);


require_once __DIR__ . "/Business/UserService2.php";
require_once __DIR__ . "/Exceptions/WachtwoordenKomenNietOvereenException.php";
require_once __DIR__ . "/Exceptions/GebruikerBestaatAlException.php";

$error = "";

if (isset($_GET['action']) && $_GET['action'] === 'signup') {
    $userService = new UserService();
    $username = $_POST['name'];
    $password1 = $_POST['password'];
    $password2 = $_POST['rpassword'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    try {
        $userService->checkPassword($password1, $password2);
        $userService->registerUser($username, $email, $password);
        
        $error="You have successfully signed up. Now you can <a href='./login.php'> Log In</a>";
    } catch (WachtwoordenKomenNietOvereenException $e) {
        $error = "Pasword and password repeat doesnt match!";
    } catch (GebruikerBestaatAlException $e) {
        $error = "This user is allready exists!";
    } catch (emailReedsInGebruikException $e) {
        $error = "This email is allready taken!";
    }
}

include_once __DIR__ . "/presentation/signup.php";
