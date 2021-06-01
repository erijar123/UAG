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
    <title>UAG | Create Activity</title>

          <!-- api för kartan -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.js"></script>
    <!-- api geosearch (sökfunktionen) i kartan -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    
    <script defer src="..\js\share activity.js"></script>
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

        

        <div class='formcont'>
                <br>
            <div class='bighead'>
                <h2>Create Activity:</h2>
            </div>
            <div id="line"></div><br>
            <?php echo "<form id='commentForm' class='form' method='POST' enctype='multipart/form-data' action='".setThread()."'>";?>
                

                <div class='form-control'>
                    
                    <input name='topic' class="inputbox" placeholder="Activity Name" id='topic'></textarea>
                    <small>Error message</small>
                </div>

                <div class='form-control'>
                    
                    <textarea name='threadText' id="desc" cols="30" rows="10" placeholder="Describe your activity as detailed as possible."></textarea>
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
                <h3 class="smallhead">Activity suitable for:</h3>  
                        <select name='enviroment' id='enviroment'>
                            <option value="0">Activity Suitable for:</option>
                            <option value="Indoors">Indoors</option>
                            <option value="Outdoors">Outdoors</option>
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


                <!-- Kartan -->
                <div class='form-control'>
                <input type="hidden" name='markerLocation' value='' id='markerLocation'>
                <div id="map"></div>
                <small>Error message</small>
                </div>
                <!-- <p><a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a></p> -->

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

   
    <!-- <script>

         //Sätter mappen så att den pekar på uppsala
      var map = L.map('map').setView([59.858131, 17.644621], 1);
      //ägger till ett layer med själva bilden på kartan
      L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=06sfWTAFOawnHmsssSad',{
        tileSize: 512,
        zoomOffset: -1,
        minZoom: 11,
        attribution: "\u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
        crossOrigin: true
      }).addTo(map);

      var marker = null;

      //geocodern är functionen som gör att man kan söka med hjälp av address. 
      //Lägger till en marker/pin och tar bort ev. befintlig marker
     L.Control.geocoder({
        defaultMarkGeocode: false
    })
    .on('markgeocode', function(e) {

        if(marker != null){
            map.removeLayer(marker);
        }else{
            
        }
        marker = L.marker(e.geocode.center).addTo(map);
        map.panTo(e.geocode.center);
     
    })
    .addTo(map);

////Lägger vis klick på kartarn till en marker/pin och tar bort ev. befintlig marker
map.on('click', function(e) {

        if(marker != null){
            map.removeLayer(marker);
        }else{
            
        }

        marker = L.marker(e.latlng).addTo(map);
        marker.dragging.enable();
    });

    //byter värdet på #location till latitude och longitude för markern/pin:ens placering.
    var button = document.getElementById("button");
    button.addEventListener("click", function(e){
    
      if (marker == null){
        e.preventDefault();
       alert("Select a location");
      }else{
       var location = marker.getLatLng();
  
       document.getElementById("location").value = location;
      }
      });
  
      </script> -->

</body>
</html>

<!--<input type="text" placeholder="Comment" id="comment"/>-->