

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Recipes | UAG</title>
    <link rel="stylesheet" href="../css/newstyle.css">
   
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
        

    </div>

    
</body>
</html>