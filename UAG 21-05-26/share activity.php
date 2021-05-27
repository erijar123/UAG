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
    <title>UAG | Share Activity</title>
    <script defer src="share activity.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h2>Loggin in as: <?php echo $username?> </h2>

        <nav>
            <form class='redirect' method='POST' action='logout.php'>
                <button>Logout</button>
            </form>
            <form class='redirect' method='POST' action='Home.php'>
                <button>Home</button>
            </form>
        </nav>
    </header>


   
  

<div class='container'>
        <div class='header'>
            <h2>Share Activity</h2>
        </div>
        <?php echo "<form id='commentForm' class='form' method='POST' enctype='multipart/form-data' action='".setThread()."'>";?>
            

            <div class='form-control'>
                <label for='topic'>Topic</label> <br> 
                <input name='topic' id='topic' placeholder='Topic'></textarea>
                <small>Error message</small>
            </div>

            <div class='form-control'>
                <label for='category'>Category</label> <br> 
                    <select name='category' id='category'>
                        <option value="0">Select Category:</option>
                        <option value="1">Adventure</option>
                        <option value="2">Chill</option>
                        <option value="3">Date & Romance</option>
                        <option value="4">Food & Drinks</option>
                        <option value="5">Party</option>
                    </select><br> 
                <small>Error message</small>
            </div>

            <div class='form-control'>
                <label for='outside/inside'>Enviroment</label> <br> 
                    <select name='enviroment' id='enviroment'>
                        <option value="0">Select Enviroment:</option>
                        <option value="1">Outside</option>
                        <option value="2">inside</option>
                    </select><br>                  
                <small>Error message</small>
            </div>
            

            <div class='form-control'>
                <label for='comment'>Write text here</label> <br> 
                <textarea name='threadText' id='threadText' placeholder='Text goes here...'></textarea>
                <small>Error message</small>
            </div>

            <div class='form-control' id='form-control-fileinput'>
                <label for='image'>Upload an image</label> <br> 
                <p class="xx-smalltext">    Allowed file formats: png, gif, jpeg, jpg</p>
                <input  id='fileinput' type="file" name="image" class="form-control"/>          
                <small id="fileError">Error message</small>
            </div>

            <?php echo " <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>";?>
            
            <button type ='submit' name='threadSubmit'>Submit</button>
        </form>
        </div>
  
        <?php echo "<div class='comment-container'>";?>


</div>
</body>
</html>

<!--<input type="text" placeholder="Comment" id="comment"/>-->