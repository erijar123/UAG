<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include 'setAndGetActivity.inc.php';
    include 'home.inc.php';

    if(!$_SESSION['uid']){
        header("location:login.php");
    }
 $username = getUsername($_SESSION['uid']);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAG | Activity Page</title>
    <!--<script defer src="comment script.js"></script>-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>Loggin in as: <?php echo $username?> </h2>

        <nav>
                <form class='redirect' method='POST' action='logout.php'>
                    <button>Logout</button>
                </form>

                <form class='redirect' method='POST' action='home.php'>
                    <button>Home</button>
                </form>
            
        </nav>
    </header>




   
        <div class='container'>

            <?php
            getSingleThread($_SESSION['tid']);

            echo '<form class="form" id="form" action="comment.inc.php" method="POST">';
                 echo '<div class="form-control">';
                    echo '<textarea id="comment" name="comment" placeholder="..." onchange="checkComment()"></textarea>';
                    echo '<small>Error message</small>';

                    echo "<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>";

                echo '</div>';
                echo '<button type="submit" name="cubmit">Publish</button>';
            echo '</form>';

            getcomments($_SESSION['tid']);
            
            ?>

        <?php
  
?>
</div>
</body>
</html>

