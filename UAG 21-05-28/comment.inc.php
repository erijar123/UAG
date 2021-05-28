<?php
//puts comments/ratings in the database
session_start();
    if(isset($_POST['cubmit'])){
        $tid = $_SESSION['tid'];
        $uid = $_SESSION['uid'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];
        if($comment === '' || $comment === null) {
            echo "comment error";
            exit();
        } else {     
    
            $db = new SQLite3('.\db\databas.db');
    
            $sql = "INSERT INTO comments (tid, uid, comment, date) 
            VALUES (:tid,:uid,:comment,:date)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':tid',$tid,SQLITE3_TEXT);
            $stmt->bindParam(':uid', $uid,SQLITE3_TEXT);
            $stmt->bindParam(':comment',$comment,SQLITE3_TEXT);
            $stmt->bindParam(':date',$date,SQLITE3_TEXT);

            
            $result = $stmt->execute();
            if($result) {
                $db->close();
                header('Location:activity page.php');
            } else {
                $db->close();
                echo "SQL error";
            }
        }
        $db->close();
    }




?>