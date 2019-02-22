<?php

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.themoviedb.org/3/movie/500?language=es-ES&api_key=49db17578d1b5dab0aee2a93584c24c7",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "{}",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) :
    echo "cURL Error #:" . $err;
else :
    Header("Content-type:application/json");
    echo $response;
endif;