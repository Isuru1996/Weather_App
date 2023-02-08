<?php
    $url = 'cities.json'; // path to your JSON file
    $data = file_get_contents($url); // put the contents of the file into a variable
    $characters = json_decode($data,true); // decode the JSON feed
    //echo(count($characters['List']));
?>