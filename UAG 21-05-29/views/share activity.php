<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    
    include '../setAndGetActivity.inc.php';
    include '../home.inc.php';

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
    <script defer src="../js/share activity.js"></script>
    <link rel="stylesheet" href="../css/newstyle.css">
    
    
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

        <!-- <div class="formcont">
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
        <div class="margin2"></div> -->

        <div class='formcont'>
                <br>
            <div class='bighead'>
                <h2>Create Recipe:</h2>
            </div>
            <div id="line"></div><br>
            <?php echo "<form id='commentForm' class='form' method='POST' enctype='multipart/form-data' action='".setThread()."'>";?>
                

                <div class='form-control'>
                    
                    <input name='topic' class="inputbox" placeholder="Recipe Name"></textarea>
                    <small>Error message</small>
                </div>

                <div class='form-control'>
                    
                    <textarea name='threadText' id="desc" cols="30" rows="10" placeholder="Describe your event as detailed as possible."></textarea>
                    <small>Error message</small>
                </div>

                <div class='form-control'>
                <h3 class="smallhead">Type of Event</h3> 
                        <select name='category' id='category' >
                            <option value="0">Select Category:</option>
                            <option value="Party">Party</option>
                            <option value="Chill">Chill Down</option>
                            <option value="Romance">Romance</option>
                            <option value="Adventure">Adventure</option>
                        </select><br> 
                    <small>Error message</small>
                </div>

                <div class='form-control'>
                <h3 class="smallhead">Environment</h3>  
                        <select name='enviroment' id='enviroment'>
                            <option value="0">Select Enviroment:</option>
                            <option value="1">Outside</option>
                            <option value="2">inside</option>
                        </select><br>                  
                    <small>Error message</small>
                </div>
                

                
                
                <div class='form-control' id='form-control-fileinput'>
                <h3 class="bighead">Upload Photos</h3>
                <div id="line"></div><br>
                    <p class="xx-smalltext">    Allowed file formats: png, gif, jpeg, jpg</p>
                    <input  id='fileinput' type="file" name="image" class="form-control"/>          
                    <small id="fileError">Error message</small>
                </div>

                <?php echo " <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>";?>
                <div class="margin2"></div>
                <div id="line"></div><br>
                <button type ='submit' class="btn3"  name='threadSubmit'>Submit</button>
                <div class="margin2"></div> 
        
            
            </form>
            
        </div>
        <div class="margin2"></div>
        
  
        


</div>
        

    </div>

   


   
  


</body>
</html>

<!--<input type="text" placeholder="Comment" id="comment"/>-->