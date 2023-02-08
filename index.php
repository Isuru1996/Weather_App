<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">
    <head>
        <title>Weather App</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--BootStrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <!--Weather Icon--> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css">
        <style type="text/css">
            body{
                background-image: url("img/background.jpeg");
                margin: O auto;
                color: white;   
                display: fixed;
            }
            .hero {
                position: absolute;
                min-height: 100vh;
                min-width: 100vw;
                top: 0;
                bottom: 0;
            }
            .title{
                margin: 20px;
                text-align: center;
                font-size: 50px;
            }
            .addCity{
                margin: 20px;
                text-align: center;
                
            }
            form{
                justify-content: center;
            }
            .card{
                width:400px;
                color:black;
                background-image: url("img/currentWeather.jpeg");
                border-radius: 10px;
            }
            

        </style>
    </head>
    <body>
        <div class="hero">
            <div class="title">
                    <i class="wi wi-night-sleet"></i>
                    <strong>Weather App</strong>  
            </div>
            <div class="container">
                <div class="addCity">
                    <form class="row g-3">
                        <div class="col-auto">
                          <label for="City" class="visually-hidden">City</label>
                        <input type="text" class="form-control" id="city" placeholder="Enter a city">
                        </div>
                        <div class="col-auto">
                          <button type="submit" class="btn btn-primary mb-3">Add City</button>
                        </div>
                      </form>
                </div>
                <div class="row">
                <?php

                    include ('getCitiesData.php');

                    for($i=0;$i<count($characters['List']);$i++){

                        include ('getOpenWeatherMapData.php');
                        if($response!=""){
                        $data = json_decode($response);
                        $data=(array)$data;
                        $data=(array)$data['list'][0];
                        $coord=(array)$data['coord'];
                        $main=(array)$data['main'];
                        $wind=(array)$data['wind'];
                        $sysdetails=(array)$data['sys'];
                        $clouds=(array)$data['clouds'];

                        $_SESSION['data'] = $data;
                        $_SESSION['city'] = $characters['List'][$i]['CityName'];
                    
                    
                ?>  
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo($characters['List'][$i]['CityName'].", ".$sysdetails['country']);?> </h5>
                          <table>
                            <tr>
                                <td><p class="card-text"><?php echo($main['temp'])?></p></td>
                                <td><p class="card-text"><?php echo (date('d-m-y h:i:s'))?></p></td>
                            </tr>
                            <tr>
                                <td><p class="card-text">few clouds</p></td>
                                <td><p class="card-text">temp min : <?php echo($main['temp_min'])?></p></td>
                            </tr>
                            <tr>
                                <td><p class="card-text">temp max : <?php echo($main['temp_max'])?></p></td>
                                <td><p class="card-text">Pressure : <?php echo($main['pressure'])?></p></td>
                            </tr>
                            <tr>
                                <td><p class="card-text">visiblity : <?php echo($data['visibility'])?></p></td>
                                <td style="text-align:right"><p class="card-text">sunrise: <?php echo($sysdetails['sunrise'])?></p></td>
                            </tr>
                            <tr>
                                <td><p class="card-text">sunset : <?php echo($sysdetails['sunset'])?></p></td>
            
                            </tr>
                          </table>
                          <button><a href="cardView.php">See more</a></button>
                        </div>
                      </div>
                    </div>
                    <?php }} ?>
            </div>
        </div>
    </body>
</html>