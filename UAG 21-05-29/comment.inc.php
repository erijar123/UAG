<?php
//puts comments/ratings in the database
session_start();
    if(isset($_POST['cubmit'])){
        $tid = $_SESSION['tid'];
        $uid = $_SESSION['uid'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];
        $rating = $_POST['rating'];
        if($comment === '' || $comment === null) {
            echo "comment error";
            exit();
        } else {     
            $db = new SQLite3('.\db\databas.db');

            $sqlcheck = "SELECT * FROM ratings WHERE tid=:tid";
            $stmtcheck=$db->prepare($sqlcheck);
            $stmtcheck->bindParam(':tid', $tid, SQLITE3_TEXT);
            $resultcheck = $stmtcheck->execute();
            $row = $resultcheck->fetchArray(SQLITE3_TEXT);
            
            if($row['uid']==$uid){ //add error message
                $db->close();
                header('Location:.\views\activity page.php');
                exit();
            }
    
            $sql = "INSERT INTO ratings (tid, uid, comment, date, rating) 
            VALUES (:tid,:uid,:comment,:date, :rating)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':tid',$tid,SQLITE3_TEXT);
            $stmt->bindParam(':uid', $uid,SQLITE3_TEXT);
            $stmt->bindParam(':comment',$comment,SQLITE3_TEXT);
            $stmt->bindParam(':date',$date,SQLITE3_TEXT);
            $stmt->bindParam(':rating',$rating,SQLITE3_TEXT);

            
            $result = $stmt->execute();
            if($result) {
                $db->close();
                header('Location:.\views\activity page.php');
            } else {
                $db->close();
                echo "SQL error";
            }
        }
    }
?>