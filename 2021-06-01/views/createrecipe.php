<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include '../home.inc.php';
    include '../setAndGetActivity.inc.php';

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
    <title>Home | UAG</title>
    <link rel="stylesheet" href="../css/newstyle.css">
    <script  src="/js/barscript.js"></script>
</head>
<body>

    <div id="BG">
        

        <div class="formcont">
            <br>
            <h2 class="bighead">Create Recipe:</h2>
            <div id="line"></div><br>

            <form action="">    
                <input type="text" class="inputbox"  placeholder="Recipe Name"><br>
                
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Describe your event as detailed as possible." ></textarea><br>
                <h3 class="smallhead">Type of event</h3>
                <input type="radio" name="eventtype" value="party">
                <label for="party" >Party</label>
                <input type="radio" name="eventtype" value="chill">
                <label for="chill">Chill Down</label>
                <input type="radio" name="eventtype" value="romance">
                <label for="romance">Romance</label>
                <input type="radio" name="eventtype" value="adventure">
                <label for="Adventure">Adventure</label>
                <br><br><br><br>    

                <h3 class="bighead">Ingredients</h3>
                <div id="line"></div><br>

                <h3 class="smallhead">Weather</h3>
                <input type="radio" name="weather" value="sun">
                <label for="sun" >Sun</label>
                <input type="radio" name="weather" value="rain">
                <label for="rain">Rain</label>
                <input type="radio" name="weather" value="either">
                <label for="either">Either</label>
                
                
                <h3 class="smallhead">Participants</h3>
                <input type="radio" name="participants" value="1">
                <label >Solo</label>
                <input type="radio" name="participants" value="2.5">
                <label >2-5</label>
                <input type="radio" name="participants" value="5.10">
                <label >5-10</label>
                <input type="radio" name="participants" value="10.20">
                <label >10-20</label>
                
                <!-- Antingen tidsåtgång eller tidspunkt.-->
                <h3 class="smallhead">Approximate Time Required</h3>
                <input type="radio" name="timereq" value="hrs">
                <label >Couple of hours</label>
                <input type="radio" name="timereq" value="hd">
                <label >Halfday</label>
                <input type="radio" name="timereq" value="wd">
                <label >Wholeday</label>
                <input type="radio" name="timereq" value="mo">
                <label >Morning</label>
                <br><br>
                <input type="radio" name="timereq" value="ev">
                <label >Evening/Night</label>
                
                <!-- -->
                

                <h3 class="smallhead">Normal Components</h3>
                <input type="checkbox" id="com1" name="com1" value="speaker">
                <label for="com1" id="check"> Speaker</label>
                <input type="checkbox" id="com2" name="com2" value="alcohol">
                <label for="vehicle2" id="check"> Alcohol</label>
                <input type="checkbox" id="com3" name="vehicle3" value="Boat">
                <label for="vehicle3" id="check"> Picnic</label>

                <h3 class="smallhead">Hard Components (optional)</h3>
                <p class="info">Did u use any hard components?</p>
                <p class="info">Please specify if you used any components that might be less common.</p>
                <input type="text" class="hc"  placeholder="Component 1 (optional)"><br>
                <input type="text" class="hc"  placeholder="Component 2 (optional)"><br>
                <input type="text" class="hc"  placeholder="Component 3 (optional)"><br>
                <br><br>
                <h3 class="bighead">Upload Photos</h3>
                <div id="line"></div><br>
                <div id="posmid">
                <label for="img">Select image:</label>
                <input type="file" id="img" name="img" accept="image/*"><br>
                </div>
                

                <button type="submit" class="btn" id="posmid">Post Recipe</button>

            </form>

        </div>
        <div class="margin2">
        </div>
        

    </div>

    
</body>
</html>