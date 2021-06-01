<?php
include '../api/weatherapi.php';  


//TEST FÖR TOPRANKADE INLÄGG KATEGORI:PARTY 
                    if($sunny){
                    function getTopParty(){                       
                  
                        $db = new SQLite3('../db/databas.db');     
                        $sql = "SELECT threads.tid,sum(ratings.rating) as antal FROM threads join ratings on threads.tid = ratings.tid where threads.category = 'Party'
                        and enviroment = 'Outdoors' 
                        group by threads.tid
                        order by antal desc
                        LIMIT 1"; ;  
                          
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
                        function getTopParty(){                       
                  
                            $db = new SQLite3('../db/databas.db');     
                            $sql = "SELECT threads.tid,sum(ratings.rating) as antal FROM threads join ratings on threads.tid = ratings.tid where threads.category = 'Party'
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
                            function getTopParty(){                       
                                    //Visas ej för att threads.tid och ratings.tid har olika tid i databasen, sök med sql-frågan nere för att se
                                    //threads.category har även value 1 och inte 'Party' i databasen
                                $db = new SQLite3('../db/databas.db');     
                                $sql ="SELECT threads.tid,sum(ratings.rating) as antal FROM threads join ratings on threads.tid = ratings.tid where threads.category = 'Party'            
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