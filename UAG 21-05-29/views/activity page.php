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
</head>
<body>

    <div id="BG">
            <?php
                if (isset($_SESSION['uid'])===true){
                include '../headers/loggedin.php';
                } else{
                    include './headers/notloggedin.php';
                }
            
            ?>

                <?php
                getSingleThread($_SESSION['tid']);
                getcomments($_SESSION['tid']);
                if (isset($_SESSION['uid'])===true){
                echo '<form class="form" id="form" action="../comment.inc.php" method="POST">';
                    echo '<label for="rating">Your rating:</label>
                    <select id="rating" name="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select>';
                    echo '<div class="form-control">';
                        echo '<textarea id="comment" name="comment" placeholder="Write your comment here" onchange="checkComment()"></textarea>';
                        echo '<small>Error message</small>';

                        echo "<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>";

                    echo '</div>';
                    echo '<button type="submit" name="cubmit">Publish</button>';
                echo '</form>';
            }
            if(function_exists('getreating')){
                getreating($_SESSION['tid']);
            }
                ?>


            
    </div>


   
        



</body>
</html>

