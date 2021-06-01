function hideall(){
    
    hidechill()
    hiderom()
    hidead()
    hideparty()
}

function displayparty() {
    
    document.getElementById("party").style.backgroundColor=" #d0a8dd"
    document.getElementById("pacon").style.opacity = "1";
    
    
    //document.getElementById("pacon").style.display = "block";
    
    
}
function hideparty(){
    document.getElementById("party").style.backgroundColor=" #353434"
    document.getElementById("pacon").style.opacity = "0";
    //document.getElementById("pacon").style.display = "none";
}

function displaychill() {
    
    document.getElementById("chill").style.backgroundColor=" khaki"
    document.getElementById("chicon").style.opacity = "1";
    //document.getElementById("pacon").style.display = "block";
    
    
}
function hidechill(){
    document.getElementById("chill").style.backgroundColor=" #353434"
    document.getElementById("chicon").style.opacity = "0";
    //document.getElementById("pacon").style.display = "none";
}

function displayrom() {
    
    document.getElementById("romance").style.backgroundColor=" lightcoral"
    document.getElementById("romcon").style.opacity = "1";
    
    
    //document.getElementById("pacon").style.display = "block";
    
    
}
function hiderom(){
    document.getElementById("romance").style.backgroundColor=" #353434"
    document.getElementById("romcon").style.opacity = "0";
    //document.getElementById("pacon").style.display = "none";
}

function displayad() {
    
    document.getElementById("adventure").style.backgroundColor=" lightgreen"
    document.getElementById("adcon").style.opacity = "1";
    //document.getElementById("pacon").style.display = "block";
    
    
}
function hidead(){
    document.getElementById("adventure").style.backgroundColor=" #353434"
    document.getElementById("adcon").style.opacity = "0";
    //document.getElementById("pacon").style.display = "none";
}

function hideshowcomments(){
    var x = document.getElementById("commentheader");
    var y = document.getElementById("commentheader2")
    
  if (x.style.opacity === "0") {
    
    x.style.display="block"
    x.style.opacity = "1";
    y.innerHTML="Hide Comments";
    window.scrollBy(0, 1000);

  } else {
    x.style.display="none"
    x.style.opacity = "0";
    y.innerHTML="Show Comments"
  }
}

//for the map on "activitypage" and "homepage"

try{
    var topParty = document.getElementById("topParty").value;
    var topChill = document.getElementById("topChill").value;
    var topRomance = document.getElementById("topRomance").value;
    var topAdventure = document.getElementById("topAdventure").value;
    var getMap = [topParty, topChill, topRomance, topAdventure];
}catch(error){
    var sessionTid = document.getElementById("sessionTid").value;
    var getMap = [sessionTid];
}



for (i = 0; i < getMap.length; i++){
    var map = L.map("getMap".concat(getMap[i])).setView([59.858131, 17.644621], 11);

    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=06sfWTAFOawnHmsssSad',{
        tileSize: 512,
        zoomOffset: -1,
        minZoom: 8,
        attribution: "\u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
        crossOrigin: true
      }).addTo(map);
    
    
      var marker = document.getElementById("getMarkerLocation".concat(getMap[i])).value;
        var lat = marker.substring(7,16);
        var lng = marker.substring(18,27);
      
    
    L.marker([lat, lng]).addTo(map);
      map.panTo([lat, lng]);

}
