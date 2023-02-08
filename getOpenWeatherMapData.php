<?php
    $response="";
    try{
        $response = file_get_contents("https://samples.openweathermap.org/data/2.5/group?id=".$characters['List'][$i]['CityCode']."&units=metric&appid=439d4b804bc8187953eb36d2a8c26a02");
    }
    catch(Exception $e){
        echo $e;
    }
    
?>