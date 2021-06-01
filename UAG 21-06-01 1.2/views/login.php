<?php   
session_start();
    date_default_timezone_set('Europe/Stockholm');
    
    include '../users.inc.php';
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="../js/login script.js"></script>
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
        <form id='loginForm' class='logsign-formbox' id=loginForm method='POST' action='".getUserLogin()."'>
        <div class='textfield'>
            <h1>Login</h1>
            
            
            <div class='form-control'>
            <label for='username'>Username:</label><br>
            <input type='text' name='username' id='loginUsername' class='inputbox'><br>
            <small>Error message</small><br>
            <div>
            
            </div>
            </div>

        <div class='form-control'>
        <label for='username'>Password:</label><br>
        <input type='password' name='password' id='loginPassword' class='inputbox'><br>
        <small>Error message</small><br>
        </div>
            <br>
           
        <button type='submit' name='userLogin' class='btn3'>Login</button>
        <div class='margin'></div>
        </div>
        </form>
        ";
        if (isset($_GET['usr_ntfnd'])){
            echo "<P class='error'>User not found</P>";
        }
        echo"
        ";
        
        ?>
    </div>
        
       
        
        
        
        


        
        

       
     
        
        
        
        

       

    </div>

    
    

</body>
</html>