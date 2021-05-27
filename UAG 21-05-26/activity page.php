<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include 'dbh.inc.php';
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
    <script defer src="comment script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>Loggin in as: <?php echo $username?> </h2>

        <nav>
                <form class='redirect' method='POST' action='logout.php'>"; 
                    <button>Logout</button>
                </form>

                <form class='redirect' method='POST' action='home.php'>
                    <button>Home</button>
                </form>
            
        </nav>
    </header>




   
        <div class='container'>
            <form class='form' action="">

            <?php   if($_GET){
        $tid = $_GET['thread']; // print_r($_GET);       
    }else{
      echo "Url has no user";
    }
            getSingleThread($tid)?>

            </form>
        </div>

        <?php
  
?>
</div>
</body>
</html>

