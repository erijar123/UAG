<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | UAG</title>
    <link rel="stylesheet" href="/css/newstyle.css">
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
        
        <div class='postcon'>

            <div class='headerspot'>
                <h3>Jag är en header och titel för eventet</h3>

                
            </div>
            <div class='split'></div>
            <div class='descspot'>
                <p>
                jag är en beskrivning...
                jag är en beskrivning...jag är en beskrivning...jag är en beskrivning...jag är en beskrivning...
                jag är en beskr
                jag är en beskrjag är en beskrjag är en beskrjag är en beskrjag är en beskr
                jag är en beskrjag är en beskrjag är en beskr
                jag är en beskrjag är en beskr

                </p>
                
            </div>
            <div class='meta'>
                <p id='meta'>Created on:</p> 
                <p id='meta'>By: </p>
                
            </div>

            <div class='rankspot'>
                <p id="rank">4,5/5 </p>
                
                <img src='../images/Gold_Star.svg.png' alt='star' id='star'>
            </div>
        <div class='attributes'></div>

        <div class='imgspot'></div>
            <div class='margin2'></div>

        </div>

        
     
       

       

    </div>

    
</body>
</html>