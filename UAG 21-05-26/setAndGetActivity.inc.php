<?php



function setThread() {
   if(isset($_POST['threadSubmit'])) {
    $uid = $_SESSION['uid'];
    $topic = $_POST['topic'];
    $category = $_POST['category'];
    $enviroment = $_POST['enviroment'];
    $date = $_POST['date'];
    $threadText = $_POST['threadText'];

    if($threadText === '' || $threadText === null || $topic === '' || $topic === null) {
        echo "Thread error";
    } elseif($category == 0){
        echo "Please select a category";
    }elseif($enviroment == 0){
        echo "Please select an enviroment";
    }else {     

        $db = new SQLite3('./db/databas.db');

        $sql = "INSERT INTO 'threads' ('uid', 'topic', 'category', 'enviroment', 'date', 'threadText') 
        VALUES (:uid,:topic,:category,:enviroment,:date,:threadText)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':uid', $uid,SQLITE3_TEXT);
        $stmt->bindParam(':topic',$topic,SQLITE3_TEXT);
        $stmt->bindParam(':category', $category,SQLITE3_TEXT);
        $stmt->bindParam(':enviroment', $enviroment,SQLITE3_TEXT);
        $stmt->bindParam(':date',$date,SQLITE3_TEXT);
        $stmt->bindParam(':threadText',$threadText,SQLITE3_TEXT);
    
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
                   header("location:activity page.php?thread=$tidthread");
            }
        }
    }
   }  
}
function setImageIdInDatabase($image_id, $tid){
    $db = new SQLite3('./db/databas.db');

    $sql = "UPDATE threads SET image_id=:image_id WHERE tid=:tid";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':tid', $tid,SQLITE3_TEXT);
    $stmt->bindParam(':image_id', $image_id,SQLITE3_TEXT);

    $stmt->execute();
    $db->close();

}



function getImageId(){
    $db = new SQLite3('./db/databas.db');

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
    $image_location = "images/".$image_name;
    
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


function getThreads($username){
    $db = new SQLite3('./db/databas.db');

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

            echo "<div class='comment-box'>";
            echo "<form id='GoToThreadForm' class='form' method='POST' action='".GoToNextPage($tidthread)."'>";            
            echo "<p class='postedThreadTopic'>".$row['topic']."</p>";
            echo "<p class='postedCommentDate'>".$row['date']."</p>";
            echo "<p class='postedThreadUsername'>Created by: ".getUsername($row['uid'])."</p>";
            echo "<button type ='submit' name='threadSubmit' value='$tidthread'>Explore Activity</button>";
            echo "</p></form></div>";


    }   
}  


function GoToNextPage($tidthread){
    if(isset($_POST['threadSubmit'])){
    
        header('Location:activity page.php?thread='.$_POST['threadSubmit']);
    exit();
    }
    
}

function getSingleThread($tid) {

    $db = new SQLite3('./db/databas.db');

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
            echo "<div id='thread-box'>";
            echo "<p class='postedThreadTopic'>".$row['topic']."</p>";
            echo "<p class='postedCommentDate'>".$row['date']."</p>";
            echo "<p class='postedThreadUsername'>Posted By: ".getUsername($row['uid'])."</p><br>";
            echo "<p>".nl2br($row['threadText'])."<br><br>";
             //Image whileloop
             while($row_image=$result_image->fetchArray()){
                echo"<tr><td><img src='".$row_image['image_location']."' width='500px' height:500px></td></tr>";
            }
        echo "</p></div>";
        }  
        }
    }   
}




    
