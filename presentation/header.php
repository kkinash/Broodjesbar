<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <title>Broodoverzicht</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<header>
 
  <!-- MENU START -->
  <nav style="display:flex;">
    <a href="./index.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="./orders.php">Orders</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
    if (!isset($_SESSION['userAccount'])) {
      ?> 
        <a href="./login.php">Login</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="./signup.php">Sign Up </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
      
      <?php
    } else { ?>
    
    
 
    <?php try {
    ?> <span style="margin-left: auto;">  <?php print 'Hello, ' . $_SESSION['user'];
    } catch (UserNotFoundException $e) {
    }
    ; ?> 
    <a href="./logout.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Log Out </a></span>
    <?php } ?></nav>
  <!-- MENU END -->
</header>