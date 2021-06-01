<?php 
    //include '../api/weatherapi.php';  
    
    /*function showTop($cweather,$threadcat){
        
        if($cweather==="Clear"){
        
            $db=new SQLITE3("../db/databas.db");
            $sql = "SELECT * FROM threads join ratings on threads.tid = ratings.tid where threads.category = ':threadcat' 
            and threads.enviroment = 'Sun'
            order by ratings.rating desc
            LIMIT 1"; 
            
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':threadcat', $threadcat, SQLITE3_TEXT);
            
            $result = $stmt->execute();
            while($row=$result->fetchArray()) {
                return $row['tid'];
        
            }
        
        }
        if($cweather==="Rain"){   
            
            $db= new SQLITE3("../db/databas.db");
            $sql = "SELECT * FROM threads join ratings on threads.tid = ratings.tid where threads.category = '$threadcat' 
            and threads.enviroment = 'Rain'
            order by ratings.rating desc
            LIMIT 1";  
            $stmnt = $db->prepare($sql);
        
            $result = $stmnt->execute();
            while($row=$result->fetchArray()){
                return $row['tid'];
        
        }
        if($cweather==="Clouds"){
            
            $db=new SQLITE3("../db/databas.db");
            $sql = "SELECT * FROM threads join ratings on threads.tid = ratings.tid where threads.category = '$threadcat' 
            order by rating desc
            LIMIT 1";  
            $stmnt = $db->prepare($sql);
            
            $result = $stmnt->execute();
            while($row=$result->fetchArray()) {
                return $row['tid'];
        
            }
        }
            
    }        
            
}  

?>

<?php 

/*else{
                
                    
                $db=new SQLITE3("./db/sqlite.db");
                $sql = "SELECT * FROM threads join ratings on threads.tid = ratings.tid where threads.category = '$threadcat' 
                order by rating desc
                LIMIT 1";  
                $stmnt = $db->prepare($sql);
                
                $result = $stmnt->execute();
                while($row=$result->fetchArray()) {
                    return $row['tid'];
            
                }*/

               //include '../api/weatherapi.php'; 


// TEST API **********
$city_name = 'Uppsala';
$api_key = '5dc403fe89f08ea6c220a9af3faecf57';

$api_url = 'http://api.openweathermap.org/data/2.5/weather?q='.$city_name.'&appid='.$api_key;

//php-funktionen json_decode sparar datan i en array istället för att datan 
//returneras i json-format. Används för att kunna visa datan i webbläsaren.
$weather_data =json_decode( file_get_contents($api_url), true);

$temperature_current_weather = $weather_data['weather'][0]['main'];

$sunny = $weather_data['weather'][0]['main'] == "Clear";
$rainy = $weather_data['weather'][0]['main'] == "Rain";

//************ 

                //TEST FÖR TOPRANKADE INLÄGG KATEGORI:CHILL 
        if($sunny){
        function getTopChill(){                       
      
            $db = new SQLite3('../db/databas.db');     
            $sql = "SELECT threads.tid,sum(ratings.rating) as antal FROM threads join ratings on threads.tid = ratings.tid where threads.category = 'Chill'
            and enviroment = 'Outdoors' 
            group by threads.tid
            order by antal desc
            LIMIT 1";   
              
            if(!$stmt=$db->prepare($sql)) {
                echo "SQL statement failed";
            } else {     
                $result = $stmt->execute();      
                while($row = $result->fetchArray(SQLITE3_TEXT)){
                    return $row['tid'];
                                  
                    }                                  
                }  
            }
            
        }                  
        elseif($rainy){
            function getTopChill(){                       
      
                $db = new SQLite3('../db/databas.db');     
                $sql = "SELECT threads.tid,sum(ratings.rating) as antal FROM threads join ratings on threads.tid = ratings.tid where threads.category = 'Chill'
                and enviroment = 'Outdoors' 
                group by threads.tid
                order by antal desc
                LIMIT 1";   
                  
                if(!$stmt=$db->prepare($sql)) {
                    echo "SQL statement failed";
                } else {                  
                    $result = $stmt->execute();      
                    while($row = $result->fetchArray(SQLITE3_TEXT)){
                        return $row['tid'];
                                      
                        }                                  
                    }  
                }
            }else{
                function getTopChill(){                       
      
                    $db = new SQLite3('../db/databas.db');     
                    $sql = "SELECT threads.tid,sum(ratings.rating) as antal FROM threads join ratings on threads.tid = ratings.tid where threads.category = 'Chill'
                    group by threads.tid
                    order by antal desc
                    LIMIT 1";   
                      
                    if(!$stmt=$db->prepare($sql)) {
                        echo "SQL statement failed";
                    } else {    
                        $result = $stmt->execute();      
                        while($row = $result->fetchArray(SQLITE3_TEXT)){
                            return $row['tid'];
                                          
                            }                                  
                        }  
                    }
                }

               
?>