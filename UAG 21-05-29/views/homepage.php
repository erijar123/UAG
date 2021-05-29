<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include '../home.inc.php';
    include '../setAndGetActivity.inc.php';

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
    <title>Home | UAG</title>
    <link rel="stylesheet" href="../css/newstyle.css">
    <script  src="../js/barscript.js"></script>
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
        
        

        
     
        <div class="activityspace" >

            <div class="text" id="posleftcorner" onmouseover="hideall()" >
                <h1 class="boxhead">Sun at last!</h1>
                <p class="boxtext"> What do you feel like doing today? </p>
                <p class="boxtext"> Here is the top pick to help you out! </p>
            </div>
            
        
            
            <div class="activitybar spacearound">
                <ul class="ac">
                    <li class="paddingspace" id="party" onmouseover=" hiderom(),hidead(),hidechill(), displayparty()">
                        <a href="" class="catchoice"  >Party</a></li>
                    <li class="paddingspace" id="chill" onmouseover="hideparty(), hiderom(),hidead(),displaychill()">
                        <a href="" class="catchoice" >Chill Down</a></li>
                    <li class="paddingspace" id="romance" onmouseover="hideparty(),hidechill(), hidead(),displayrom()">
                            <a href="" class="catchoice" >Romance</a></li>
                    <li class="paddingspacelst" id="adventure" onmouseover="hideparty(),hidechill(),hiderom(),displayad()">
                            <a href="" class="catchoice" >Adventure</a></li>
                </ul>
            </div>
        </div>
        
        
        <div class="pickscon">
            <div class="pacon" id="pacon">
               <div class="pabox1">
                    
               </div>
            </div>
            <div class="chicon" id="chicon"  >
               <div class="chibox1">

               </div>
            </div>
            <div class="romcon" id="romcon"  >
               <div class="rombox1">

               </div>
            </div>

            <div class="adcon" id="adcon" >
                <div class="advbox1">

                </div>
            </div>

        </div>

        <div class="weatherbox">
            <div class="webohead">
            <h4>Uppsala, Sweden</h4> 
            <h4>
                <?php
                echo "" . date("y/m/d") ."";
                ?>
            </h4>
            <!-- <img src="/images/sun-3-128.png" alt="sol" id="vicon"> -->
            </div>
            <div>
                <?php
                include '../api/weatherapi.php'
                ?>
            </div>
            
        </div>

       

    </div>

    
</body>
</html>