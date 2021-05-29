<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | UAG</title>
    <link rel="stylesheet" href="/css/newstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
    rel="stylesheet">

</head>

<body>
    <div id="BG">
        <?php
        if (isset($_SESSION['uID'])===true){
        include '../headers/loggedin.php';
        } else{
            include '../headers/notloggedin.php';
        }
        ?>

        <div class="container1">
            <div class="text" id="posbox">
                <h1 class="boxhead">Welcome to Uppsala Activity Guide!</h1><br>
                <p class="boxtext">We bring you inspiration to MAX your everyday. With the ”recipies” on our site you’ll have the 
                biggest chance of having a successful event. </p>
                <p class="boxtext"></p> <br>
                <p class="boxtext">Yippie! Today will be [SUNNY]!
                Hit the button below to browse sunny recipes! </p><br><br><br>

                
                    <a href="./homepage.php" class="ctn"><button class="btn">Hit me!</button></a>
                
        
            </div>
        </div>


    </div>


    
</body>
</html>