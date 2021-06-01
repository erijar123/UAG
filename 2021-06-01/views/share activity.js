
const commentForm = document.getElementById("commentForm");
const topic = document.getElementById("topic");
const category = document.getElementById("category");
const enviroment = document.getElementById("enviroment");
const threadText = document.getElementById("desc");
const allowedFileFormats = /(\.png|\.gif|\.jpeg|\.jpg)$/i;
//"png", "gif", "jpeg", "jpg"
var markerLocation = document.getElementById("markerLocation");
var marker = null;


//For map

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


// När man klickar submit


commentForm.addEventListener("submit", e => {
    
    
    // For Topic
    if (topic.value == '' || topic.value == null){
        e.preventDefault();
        setErrorFor(topic, "Topic can not be blank")
    }else{
        setSuccessFor(topic)
    }
     // For category
     if (category.value == 0){
        e.preventDefault();
        setErrorFor(category, "Category can not be blank")
    }else{
        setSuccessFor(category)
    }

    // For category
    if (enviroment.value == 0){
        e.preventDefault();
        setErrorFor(enviroment, "Enviroment can not be blank")
    }else{
        setSuccessFor(enviroment)
    }

    //For Text

    if (threadText.value == '' || threadText.value == null){
        e.preventDefault();
        setErrorFor(threadText, "Text can not be blank")
    }else{
        setSuccessFor(threadText)
    }

    //For File

    if(fileinput.value == '' || fileinput == null){

    }else{
        if (!allowedFileFormats.exec(fileinput.value)){
            e.preventDefault();
            setErrorFor(fileinput, "Wrong file format")
        }else{
            setSuccessFor(fileinput)
        }
    }

    if (marker == null){
        e.preventDefault();
        setErrorFor(markerLocation, "Please select a location");
      }else{
      
       document.getElementById("markerLocation").value = marker.getLatLng();
       alert(document.getElementById("markerLocation").value);
       setSuccessFor(markerLocation)
      }


});


function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}




/*$(document).ready(function(){

    //For updating username
    $("#threadSubmit").on("click", function(e){
    
    
        const topic = $('#topic').val();
        const threadText = $('#threadText').val();

        if(topic == '' || topic == null){
            e.preventDefault();
            alert("Topic can not be blank");
           // window.location.href = 'my profile.php'

            
        }
        
        if (threadText == '' || threadText == null) {
            e.preventDefault();
            alert("Text can not be blank");
            //window.location.href = 'my profile.php'
        }else{

        }
 
    });


});*/