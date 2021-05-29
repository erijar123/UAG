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
    debugger;
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
    debugger;
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
    debugger;
    document.getElementById("adventure").style.backgroundColor=" lightgreen"
    document.getElementById("adcon").style.opacity = "1";
    //document.getElementById("pacon").style.display = "block";
    
    
}
function hidead(){
    document.getElementById("adventure").style.backgroundColor=" #353434"
    document.getElementById("adcon").style.opacity = "0";
    //document.getElementById("pacon").style.display = "none";
}