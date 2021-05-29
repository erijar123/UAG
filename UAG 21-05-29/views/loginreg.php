

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register | UAG</title>
    <link rel="stylesheet" href="/css/newstyle.css">
   
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
        
        <div class="box2">
            <div class="textfield">
                <h4 class="boxhead">Login/Register</h4>
                <p >Login to post and rate recipes.</p>
                <p >Don't have an account yet? Hit Register and follow the steps.</p>
            </div>
            <br>
            
            <a href="../views/login.php" ><button class="btn2">Login</button></a>
            <br> <br> <br>
            <a href="../views/signup.php" ><button class="btn2">Register</button></a>
            <div class="margin2"></div>
            
        
        </div>
        

       
     
        
        
        
        

       

    </div>

    
</body>
</html>