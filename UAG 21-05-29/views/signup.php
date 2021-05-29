<?php
    session_start();    
    date_default_timezone_set('Europe/Stockholm');
    
    include '../users.inc.php';
    if (isset($_SESSION['uid'])===true){
        $username = getUsername($_SESSION['uid']);
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | UAG</title>
    <script defer src="../js/sign in script.js"></script>
    <link rel="stylesheet" href="../css/newstyle.css">
</head>
<body>

<div id="BG">
        

        <?php
        if (isset($_SESSION['uid'])===true){
        include '../headers/loggedin.php';
        } else{ 
            include '../headers/notloggedin.php';
        }
        echo "
        <div class='box2'>
                <form id='signInForm' class='logsign-formbox' method='POST' action='".setUserSignup()."'>
                    <div class='textfield'>  
                        <h1>Sign Up!</h1>

                        <div class='form-control'>
                        <label for='username'>Username:</label><br>
                        <input type='text' name='username' id='signInUsername' class='inputbox'><br>
                        <small>Error message</small><br>
                        </div>

                        <div class='form-control'>
                        <label for='email'>Email:</label><br>
                        <input type='text' name='email' id='email' class='inputbox'> <br>
                        <small>Error message</small><br>
                        </div>

                        <div class='form-control'>
                        <label for='password'>Password:</label><br>
                        <input type='password' name='password' id='password' class='inputbox'><br>
                        <small>Error message</small><br>
                        </div>

                        <div class='form-control'>
                        <label for='passwordMatch'>Retype Password:</label><br>
                        <input type='password' name='passwordMatch' id='passwordMatch' class='inputbox'><br>
                        <small>Error message</small><br>
                        </div>

                        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>

                        <button type='submit' name='userSubmit' class='btn3'>Submit</button>
                        <div class='margin'></div>
                    </div>
                </form>
                
         </div>
         <div class='margin'></div>";
        
        
        
        ?>
</div>

    




</body>
</html>