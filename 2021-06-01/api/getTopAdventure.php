<?php
//include '../api/weatherapi.php';  
//TEST API ***********
$city_name = 'Uppsala';
$api_key = '5dc403fe89f08ea6c220a9af3faecf57';

$api_url = 'http://api.openweathermap.org/data/2.5/weather?q='.$city_name.'&appid='.$api_key;

//php-funktionen json_decode sparar datan i en array istället för att datan 
//returneras i json-format. Används för att kunna visa datan i webbläsaren.
$weather_data =json_decode( file_get_contents($api_url), true);

$temperature_current_weather = $weather_data['weather'][0]['main'];

$sunny = $weather_data['weather'][0]['main'] == "Clear";
$rainy = $weather_data['weather'][0]['main'] == "Rain";


// *************

//TEST FÖR TOPRANKADE INLÄGG KATEGORI:ROMANCE 
                    if($sunny){
                    function getTopAdventure(){                       
                  
                        $db = new SQLite3('../db/databas.db');     
                        $sql = "SELECT threads.tid FROM threads join ratings on threads.tid = ratings.tid where threads.category = 'Adventure'
                        and threads.enviroment = 'Sun'
                        order by ratings.rating desc
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
                       function getTopAdventure(){                       
                  
                            $db = new SQLite3('../db/databas.db');     
                            $sql = "SELECT threads.tid FROM threads join ratings on threads.tid = ratings.tid where threads.category = 'Adventure' 
                            and threads.enviroment = 'Rain'
                            order by ratings.rating desc
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
                             function getTopAdventure(){                                                                                         
                                $db = new SQLite3('../db/databas.db');     
                                $sql = "SELECT threads.tid FROM threads join ratings on threads.tid = ratings.tid where threads.category = 'Adventure' 
                                order by ratings.rating desc
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