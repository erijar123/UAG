<?php 


$city_name = 'Uppsala';
$api_key = '5dc403fe89f08ea6c220a9af3faecf57';

$api_url = 'http://api.openweathermap.org/data/2.5/weather?q='.$city_name.'&appid='.$api_key;


//php-funktionen json_decode sparar datan i en array istället för att datan 
//returneras i json-format. Används för att kunna visa datan i webbläsaren.
$weather_data =json_decode( file_get_contents($api_url), true);

//Hämtar temperaturen från "main" arrayen där temperaturen temp sparas
$temperature = $weather_data['main']['temp'];

//Omvandlar temperaturen från kelvin till celsius och rundar av till heltal
$temperature_in_celsius = round($temperature - 273.15);

//Hämtar nuvarande temperatur och väderlek från weather-arrayen. [0] är själva arrayen och och main är väderlek (t.ex Clouds eller Sun)
$temperature_current_weather = $weather_data['weather'][0]['main'];

//Hämtar description för nuvarande väder i weather-arrayen, t.ex "overcast clouds"
$temperature_current_weather_description = $weather_data['weather'][0]['description'];

//Hämtar ikonen som är kopplad till nuvarande väder i weather-arrayen
$temperature_current_weather_icon = $weather_data['weather'][0]['icon'];

//Printar temperaturen på hemsidan.
echo"<div id='temp'>";
echo "It is " . $temperature_in_celsius . " ˚C i Uppsala right now.";
echo "</div>";
//Visar ikonen för nuvarande väder
echo "<div id='vicon'>";
echo"<img src='http://openweathermap.org/img/wn/".$temperature_current_weather_icon."@2x.png' />";
echo "</div>";

//test: Om temperaturen är under 12 grader printas "Idag är det kallt" (285.15 kelvin är 12 grader celsius)
//if($temperature = $weather_data['main']['temp'] < 285.15 ){
    
    
//}

/*
//test: Om temperaturen är mellan 12- 18 grader printas "Idag är det ljummet"
if($temperature = $weather_data['main']['temp'] >= 285.15 && $weather_data['main']['temp'] <= 291.15){
  
    echo "Idag är det ljummet";
}

//test: Om temperatuen är över 18 grader printas "Idag är det varmt"
if($temperature = $weather_data['main']['temp'] > 291.15){

    echo "Idag är det varmt";
}

*/
?>