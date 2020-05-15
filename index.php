<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.themoviedb.org/4/list/1?api_key=75e296279a5da656dbc38ffba223a8cd&page=1",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    //CURLOPT_POSTFIELDS => "{}",
    CURLOPT_HTTPHEADER => array(
        "authorization: eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3NWUyOTYyNzlhNWRhNjU2ZGJjMzhmZmJhMjIzYThjZCIsInN1YiI6IjVjM2ZiMDVlOTI1MTQxNTZlNWFmNjljMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.pJVEZTlniSFkGwEo3KR2bkbmUtUKTAmpBouflB9_Bz0",
        "content-type: application/json;charset=utf-8"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$result = json_decode($response, true);

//print_r($result);

foreach ($result as $key => $value) {
    if ($key == "results") {
        foreach ($value as $arrayKey => $content) {
//            var_dump($value);
//            if ($arrayKey == "resultss") {
            $movie_id = $content["id"];

            $ip_nietvergeten = "83.83.238.191";

            $ip = $_SERVER["REMOTE_ADDR"];

            $videospider_url = file_get_contents("https://vsrequest.video/request.php?key=DBUBFDLOJCRjoGBA&secret_key=nzgbf338ysoh17zbrida1f4xrvt74d&video_id=$movie_id&tmdb=1&ip=$ip");
            echo "<iframe src= $videospider_url  width='600' height='400' allowfullscreen='true' scrolling='no'></iframe>";

//            echo $_SERVER["REMOTE_ADDR"];
//            echo $movie_id . "<br>";


//            }
        }
    }
}

