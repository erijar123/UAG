<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include 'home.inc.php';
    include 'setAndGetActivity.inc.php';

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
    <title>UAG | Home</title>
    <script defer src="comment script.js"></script>
    <link rel="stylesheet" href="./css/newstyle.css">
</head>
<body>
    <div id="BG">
        <?php
            if (isset($_SESSION['uid'])===true){
            include './headers/loggedin.php';
            } else{
                include './headers/notloggedin.php';
            }
        
        ?>
        <div class="textfield">
                <h2 class="boxhead">Browse Recipes</h2>
        </div>


        

            <?php 
            
            
            getThreads();
            
            ?>
            </div>
    </div>
</body>
</html>

