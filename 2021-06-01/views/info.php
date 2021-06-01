<?php
session_start();
include '../setAndGetActivity.inc.php';
include '../api/homepageupdate.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | UAG</title>
    <link rel="stylesheet" href="../css/newstyle.css">
    <script  src="/js/barscript.js"></script>
</head>
<body>

    <div id="BG">
        
        <?php
        if (isset($_SESSION['uid'])===true){
            include '../headers/loggedin.php';
            } else{ 
                include '../headers/notloggedin.php';
            }
       
        ?>
        
        <?php
        $cweather=$GLOBALS['currentweather'];
        echo"$cweather";
        $threadcat = "Party";
        $topid=showTop($cweather,$threadcat);
        echo"$topid";
        // getSingleThread();

        
        ?>

        <!-- if($threadcat==="Party"){
            header("location:../views/onboarding.php");
        } -->
        
     
       

       

    </div>

    
</body>
</html>