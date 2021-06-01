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
