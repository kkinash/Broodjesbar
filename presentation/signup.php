<?php

// signup.php
declare(strict_types=1);

require_once "header.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>SignUp!</title>
</head>

<body>
<form action="?action=signup" method="POST">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" value="John">
  
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" value="1@ex.be" required>
  
  <label for="password">Password:</label>
  <input type="password" id="password" name="password"  minlength="8" required>
  
  <label for="rpassword">Repeat password:</label>
  <input type="password" id="rpassword" name="rpassword"  minlength="8" required>
  
<br>
  <input type="submit" name="btnSingUp" value="Sign Up">

  <br>
  <?php
          if($error){
        ?>                  
                    <p class="text-danger"><?php echo $error; ?></p>

        <?php
          }
        ?>   
</body>

</html> 