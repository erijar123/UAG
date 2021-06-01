<?php



function setThread() {
   if(isset($_POST['threadSubmit'])) {
    $uid = $_SESSION['uid'];
    $topic = $_POST['topic'];
    $category = $_POST['category'];
    $enviroment = $_POST['enviroment'];
    $date = $_POST['date'];
    $threadText = $_POST['threadText'];
    $markerLocation = $_POST['markerLocation'];

    if($threadText === '' || $threadText === null || $topic === '' || $topic === null) {
        echo "Thread error";
    } elseif($category == "0"){
        echo "Please select a category";
    }elseif($enviroment == "0"){
        echo "Please select an enviroment";
    }elseif($markerLocation == ''){
        echo "Please select a location";
    }else {     

        $db = new SQLite3('../db/databas.db');

        $sql = "INSERT INTO 'threads' ('uid', 'topic', 'category', 'enviroment', 'date', 'threadText', 'markerLocation') 
        VALUES (:uid,:topic,:category,:enviroment,:date,:threadText,:markerLocation)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':uid', $uid,SQLITE3_TEXT);
        $stmt->bindParam(':topic',$topic,SQLITE3_TEXT);
        $stmt->bindParam(':category', $category,SQLITE3_TEXT);
        $stmt->bindParam(':enviroment', $enviroment,SQLITE3_TEXT);
        $stmt->bindParam(':date',$date,SQLITE3_TEXT);
        $stmt->bindParam(':threadText',$threadText,SQLITE3_TEXT);
        $stmt->bindParam(':markerLocation',$markerLocation,SQLITE3_TEXT);
    
        if(!$stmt->execute()) {
            $db->close();
            echo "SQL error";
        } else {
            {
                //To get thread id
                $sql = "SELECT * FROM threads ORDER BY tid DESC";
    
                $stmt=$db->prepare($sql);
                //prepare the prepared statement
                $stmt->bindParam(':tid', $tid, SQLITE3_TEXT);
                
                $result = $stmt->execute();
    
                $row = $result->fetchArray(SQLITE3_TEXT);
    
                $tidthread = $row['tid'];
                
    
                /*------------------*/
                //For setting images
                $file_name = $_FILES['image']['name'];
                $file_temp = $_FILES['image']['tmp_name'];
    
                if ($file_name == '' || $file_name == null || $file_temp == '' || $file_temp == null){
    
                }else{
                    setImage($file_name, $file_temp, $tidthread, $db);
                    $image_id = getImageId($db);   
                    setImageIdInDatabase($image_id, $tidthread);
                }
                    $db->close();
                    //header("location:activity page.php?thread=$tidthread");
                //    header("location:activity page.php?thread=$tidthread");
            }
        }
    }
   }  
}
function setImageIdInDatabase($image_id, $tid){
    $db = new SQLite3('../db/databas.db');

    $sql = "UPDATE threads SET image_id=:image_id WHERE tid=:tid";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':tid', $tid,SQLITE3_TEXT);
    $stmt->bindParam(':image_id', $image_id,SQLITE3_TEXT);

    $stmt->execute();
    $db->close();

}



function getImageId(){
    $db = new SQLite3('../db/databas.db');

    $sql = "SELECT * FROM images ORDER BY image_id DESC";
    $stmt=$db->prepare($sql);

                //prepare the prepared statement
    $stmt->bindParam(':tid', $tid, SQLITE3_TEXT);

    $result = $stmt->execute();

    $row = $result->fetchArray(SQLITE3_TEXT);

    $image_id = $row['image_id'];

    return $image_id;

}


function setImage($file_name, $file_temp, $tidthread, $db){
    $exp = explode(".", $file_name);
    $ext = end($exp);
    $image_name = time().'.'.$ext;
    $ext_allowed = array("png", "gif", "jpeg", "jpg");
    $image_location = "../images/".$image_name;
    
        if(!in_array($ext, $ext_allowed)){
            echo "<script>alert('Failed')</script>";
        }else{
            if(move_uploaded_file($file_temp, $image_location)){
                $sql_image="INSERT INTO images (image_name, image_location, tid) VALUES(:image_name, :image_location, :tid)";
                
                $stmt_image=$db->prepare($sql_image);

                $stmt_image->bindParam(':image_name', $image_name, SQLITE3_TEXT);
                $stmt_image->bindParam(':image_location', $image_location, SQLITE3_TEXT);
                $stmt_image->bindParam(':tid', $tidthread , SQLITE3_TEXT);

                $stmt_image->execute();
                $db->close();
            }

    }
}


function getThreads(){
    $db = new SQLite3('../db/databas.db');

    $sql = "SELECT * FROM threads ORDER BY tid DESC";
    //Create a prepared statement
    $stmt=$db->prepare($sql);
    //prepare the prepared statement
    $stmt->bindParam(':tid', $tid, SQLITE3_TEXT);
    $stmt->bindParam(':uid', $uid, SQLITE3_TEXT);
    $stmt->bindParam(':topic', $topic, SQLITE3_TEXT);
    $stmt->bindParam(':date', $date, SQLITE3_TEXT);
    $stmt->bindParam(':threadText',$threadText,SQLITE3_TEXT);

    $result = $stmt->execute();

        while($row = $result->fetchArray(SQLITE3_TEXT)){

            $tidthread = $row['tid'];
            $catid= $row['category'];
            
            echo"<div class='thread-box2' id='$catid'> ";
            echo "<div class='thread-box'>";
            echo "<form id='GoToThreadForm' class='form' method='POST' action='".GoToNextPage($tidthread)."'>";            
            echo "<p class='thic'>".$row['topic']."</p>";
            echo "<p class='postedThreadUsername' id='metabrowse'>Created by: ".getUsername($row['uid'])."</p>";
            echo "<p class='italic' id='metabrowse2'>".$row['date']."</p>";
            echo"<div class='minisplit'></div>";
            
            echo "<div class='rankspot2'>";
            if($row['rating'] == NULL || $row['rating'] == 'NAN'){
                echo "<p id='rank2'>-/5 </p>";
            }else{
                echo "<p id='rank2'>".$row['rating']."/5 </p>";
            }
            if(getreviews($db,$tidthread ) == 1){
                echo "<p id='votesin2'>".getreviews($db,$tidthread)." </p>";
                echo "<p id='votes2'>vote </p>";
            }else{
                echo "<p id='votesin2'>".getreviews($db,$tidthread)." </p>";
                echo "<p id='votes2'>votes </p>";
            }
            echo "<img src='../images/Gold_Star.svg.png' alt='star' id='star2'>
            </div> <br>";
            echo "<button type ='submit' name='threadSubmit' value='$tidthread' class='btn7'>Explore Activity</button>";
            echo "</p></form></div> </div>";


    }   
}  


function GoToNextPage($tidthread){ //changed this from url post to a session variable
    if(isset($_POST['threadSubmit'])){
        $_SESSION['tid'] = $_POST['threadSubmit'];
        header('Location:activity page.php');
    exit();
    }
    
}

function getSingleThread($tid) {

    $db = new SQLite3('../db/databas.db');

    $sql = "SELECT * FROM threads WHERE tid=:tid";


    if(!$stmt=$db->prepare($sql)) {
        echo "SQL statement failed";
    } else {
        //bindparameters to the placeholder
        $stmt->bindParam(':tid', $tid, SQLITE3_TEXT);
        $stmt->bindParam(':uid', $uid, SQLITE3_TEXT);
        $stmt->bindParam(':topic', $topic, SQLITE3_TEXT);
        $stmt->bindParam(':threadText', $threadText, SQLITE3_TEXT);
        $stmt->bindParam(':date', $date, SQLITE3_TEXT);
        
        //run parameters inside database
        $result = $stmt->execute();

        //sql for potential images
        $sql_image = ("SELECT * FROM images WHERE tid=:tid") or die("Failed to fetch row!");
        
        if(!$stmt_image=$db->prepare($sql_image)) {
            echo "SQL statement failed";
        } else {	
            	
            //
            $stmt_image->bindParam(':tid', $tid, SQLITE3_TEXT);

            //executes image statements
            $result_image = $stmt_image->execute();

        
        while($row = $result->fetchArray(SQLITE3_TEXT)){
            echo"
            <div class = 'colorcon' id=".$row['category'].">
            <div class='postcon'>

            <div class='headerspot'>
                <h3>".$row['topic']."</h3> 
            </div>
            <div class='split'></div>
            <div class='descspot'>
                
                ".nl2br($row['threadText'])."
                
                
            </div>
            <div class='meta'>
                <p id='meta'>Created by: ".getUsername($row['uid'])." </p> 
                <p id='meta'>Published: ".$row['date']." </p>
                
            </div>

            <div class='rankspot'>";
            if($row['rating'] == NULL || $row['rating'] == 'NAN'){
                echo "<p id='rank'>-/5 </p>";
            }else{
                echo "<p id='rank'>".$row['rating']."/5 </p>";
            }
            if(getreviews($db,$tid) == 1){
                echo "<p id='votesin'>".getreviews($db,$tid)." </p>";
                echo "<p id='votes'>vote </p>";
            }else{
                echo "<p id='votesin'>".getreviews($db,$tid)." </p>";
                echo "<p id='votes'>votes </p>";
            }
            echo "<img src='../images/Gold_Star.svg.png' alt='star' id='star'>
            </div>
            
            <div class='attributes'>
                <p id='attribute'>Type of activity: </p>
                <p id='attribute'> Suitable for: </p> <br>
                <p class='attributec' id=".$row['category'].">".$row['category']." </p>
                <p class='attributee' id=".$row['enviroment']."> ".$row['enviroment']."</p>
            </div>

            <div class='imgspot'> ";
                while($row_image=$result_image->fetchArray()){
                echo"<tr><td><img src='../".$row_image['image_location']."' id='imgid'></td></tr>
            </div>
            <h3 class='locationheader'>Suggested Location:</h3>
            <div class ='locationspot'>
            
            </div>
                <div class='margin2'></div>
        </div>
        </div>";




            
        
        }  
        }
    }   
}

function getcomments($tid){ //Show comments/ratings on the particular thread 
    $db = new  SQLite3("../db/databas.db");
    $showcom = "SELECT * FROM ratings WHERE tid=:tid ORDER BY cid";
    if(!$stmt = $db->prepare($showcom)){
        echo "SQL statement failed";
        $db->close();
    }else{
        $stmt->bindParam(':tid', $tid,SQLITE3_TEXT);
        $result = $stmt->execute();
        while($row = $result->fetchArray()){
           $userid = $row['uid'];
           $usercid = $row['cid'];
           $showuser = "SELECT * FROM users WHERE uid LIKE :userid";
           $userstmt = $db->prepare($showuser);
           $userstmt->bindParam(':userid', $userid);
           $userresult = $userstmt->execute();
           while($userrow = $userresult->fetchArray()){
              echo "<div class='comments-box'>";
              
              echo "<p id='cmeta' class='thic'>Posted by: ". $userrow['username'] . '</p>';
              echo "<p id='cmeta' class='italic'>Date: ". $row['date'] . '</p><br><br><br>'; 
              echo "<p>Rating:".$row['rating']. "</p>";
              echo"<div class= 'thecomment'>";
              echo nl2br($row['comment'] . '<br><br>');
               echo "</div>";
               
              if(isset($_SESSION['uid']) && $userid == $_SESSION['uid']){
                echo "<form class='delete-form' method='POST' action='".deletecom($db)."'>
                <input type='hidden' name='cid' value='".$usercid."'>
                <button type='submit' class='btn6' name='deletcom'>Delete</button>
             </form>";
             }
             
              echo "</div>";
           }
        }
        $db->close();
    }
  }
function deletecom($db){ //suppose to delete comments but instead kills database...oops
    if(isset($_POST['deletcom'])){
       $commentid = $_POST['cid'];
       $deletecom = "DELETE FROM ratings WHERE cid=:comid";
       $delstmt = $db->prepare($deletecom);
       $delstmt->bindParam(':comid', $commentid,SQLITE3_TEXT);
       if($delstmt->execute()){
       }
       else{
       }
       header("location:./activity page.php");
   }
function getreating($tid){
    ini_set("precision", 3);
    $db = new SQLite3('../db/databas.db');

    $sqlcheck = "SELECT * FROM ratings WHERE tid=:tid";
    $checkstmt = $db->prepare($sqlcheck);
    $checkstmt->bindParam(':tid', $tid, SQLITE3_TEXT);
    $result = $checkstmt->execute();
    $total = 0;
    while($row = $result->fetchArray(SQLITE3_TEXT)){
        $total += $row['rating'];
    }
    $sqlrows = "SELECT COUNT(*) as count FROM ratings WHERE tid=:tid";
    $rowstmt = $db->prepare($sqlrows);
    $rowstmt->bindParam(':tid', $tid, SQLITE3_TEXT);
    $rowresult = $rowstmt->execute();
    while($rowc = $rowresult->fetchArray(SQLITE3_TEXT)){
        $numRows = $rowc['count'];
    }

    if($total == 0){
        $sqlinsert = "UPDATE threads SET rating= NULL WHERE tid=:tid";
        $stmtinsert = $db->prepare($sqlinsert);
        $stmtinsert->bindParam(':tid', $tid, SQLITE3_TEXT);
    
        $resultinsert = $stmtinsert->execute();
    
        if($resultinsert){
            $db->close();
        }else{
            $db->close();
            echo "SQL error";
        }
    }else{
        $realrate = $total/$numRows;

        $sqlinsert = "UPDATE threads SET rating='$realrate' WHERE tid=:tid";
        $stmtinsert = $db->prepare($sqlinsert);
        $stmtinsert->bindParam(':tid', $tid, SQLITE3_TEXT);
    
        $resultinsert = $stmtinsert->execute();
    
        if($resultinsert){
            $db->close();
        }else{
            $db->close();
            echo "SQL error";
        }
    }

 }
 }

    }
    function getreviews($db,$tid){
        $sqlrows = "SELECT COUNT(*) as count FROM ratings WHERE tid=:tid";
        $rowstmt = $db->prepare($sqlrows);
        $rowstmt->bindParam(':tid', $tid, SQLITE3_TEXT);
        $rowresult = $rowstmt->execute();
        while($rowc = $rowresult->fetchArray(SQLITE3_TEXT)){
            $numRows = $rowc['count'];
        }
        return $numRows;
    }




    
