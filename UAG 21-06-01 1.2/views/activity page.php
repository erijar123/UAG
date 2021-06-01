<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include '../setAndGetActivity.inc.php';
    include '../home.inc.php';

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
    <title>UAG | Activity Page</title>
    <!--<script defer src="comment script.js"></script>-->
    <link rel="stylesheet" href="../css/newstyle.css">

     <!-- för location api -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.js"></script>
    <!-- för geosearch -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script defer src="../js/barscript.js"></script>
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

            echo "<input type='hidden' id='sessionTid' value='".$_SESSION['tid']."'>";
            getSingleThread($_SESSION['tid']);
            ?>
            <br>
            <div class="textfield"  onclick='hideshowcomments()' >
            <h2 class="boxhead" id="commentheader2"  >Show Comments</h2>
            </div>
            <div class="comments" id="commentheader">
                
            <?php    
            echo '<div class="commentscroll">';
            getcomments($_SESSION['tid']);
            echo '</div>';
            
            if(function_exists('getreating')){
                getreating($_SESSION['tid']);
            }
            if (isset($_SESSION['uid'])===true){
                
                echo ' <div id="commentpost">
                <div class="textfield">
                <h2 class="boxhead">Leave Comment</h2>
                </div>
                    <form class="form" id="form" action="../comment.inc.php" method="POST">
                        <label for="rating">Your rating:</label>
                        <select id="rating" name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <div class="form-control">
                            <textarea id="comment" name="comment" placeholder="Write your comment here" onchange="checkComment()"></textarea>
                            <small>Error message</small>';
                            echo "<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>";
                            echo '</div>
                            <button type="submit" class="btn5" name="cubmit">Publish</button>
                    </form>
                    

                    </div>
                    
                    ';
            }else{
               echo' <div id="commentpost">
               <div class="textfield">
                <h2 class="boxhead">Leave Comment</h2>
                <h3 class="boxhead italic" id="italic">You have to login to leave a review</h3>
                </div>
               </div>';
            }

            
            
                
            
            ?>
            </div>
            
            
            <!-- <?php
            // getcomments($_SESSION['tid']);
           
            
            // if(function_exists('getreating')){
            //     getreating($_SESSION['tid']);
            // }

            
            ?> -->



            
                  
            
            
            
            

                
            
                


            
    </div>


   
        



</body>
</html>

