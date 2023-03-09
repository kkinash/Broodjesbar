<?php 
declare(strict_types=1); 


?> 
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8> 
        <title>Login</title> 
    </head>
    <body>
        <div class="m-5">
            <h1>Login</h1>

           <?php if (!isset($_SESSION["user"])) { ?>

            <div class="my-5">
                <form action="./login.php?action=process" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Gebruikersnaam: </label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label">Passwoord: </label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
        <?php
        }
        else {
            Print('You are allready loged in. Want to Log out?');
        }
          if($error){
        ?>                  
                    <p class="text-danger"><?php echo $error; ?></p>

        <?php
          } 
        
          
        ?>                  
    
            </div>
    </body>
</html>

