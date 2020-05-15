<?php


class MovieApiLogic
{

    public function moviesApiCall()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
//    CURLOPT_URL => "https://api.themoviedb.org/4/list/1?api_key=75e296279a5da656dbc38ffba223a8cd&page=1",
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/popular?api_key=75e296279a5da656dbc38ffba223a8cd&page=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3NWUyOTYyNzlhNWRhNjU2ZGJjMzhmZmJhMjIzYThjZCIsInN1YiI6IjVjM2ZiMDVlOTI1MTQxNTZlNWFmNjljMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.pJVEZTlniSFkGwEo3KR2bkbmUtUKTAmpBouflB9_Bz0",
                "content-type: application/json;charset=utf-8"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $result = json_decode($response, true);
    }

    public function singleMovieApiCall($movieID)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
//    CURLOPT_URL => "https://api.themoviedb.org/4/list/1?api_key=75e296279a5da656dbc38ffba223a8cd&page=1",
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movieID?api_key=75e296279a5da656dbc38ffba223a8cd",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3NWUyOTYyNzlhNWRhNjU2ZGJjMzhmZmJhMjIzYThjZCIsInN1YiI6IjVjM2ZiMDVlOTI1MTQxNTZlNWFmNjljMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.pJVEZTlniSFkGwEo3KR2bkbmUtUKTAmpBouflB9_Bz0",
                "content-type: application/json;charset=utf-8"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $result = json_decode($response, true);

    }

    public function constructHome()
    {
        $result = $this->moviesApiCall();

        $html = "";
        $ip = $_SERVER["REMOTE_ADDR"];
        foreach ($result as $key => $value) {
            if ($key == "results") {
                foreach ($value as $arrayKey => $content) {
                    $movie_id = $content["id"];
                    $movie_title = $content["original_title"];
                    $imageurl = $content["poster_path"];
                    $videospider_url = file_get_contents("https://vsrequest.video/request.php?key=DBUBFDLOJCRjoGBA&secret_key=nzgbf338ysoh17zbrida1f4xrvt74d&video_id=$movie_id&tmdb=1&ip=$ip");

                    $html .= "<div class='movie-poster-box col-3'>";
                    $html .= "<a href='?request=watch&link=$videospider_url&mov_id=$movie_id' title='$movie_title' class='home-movie-link'>";
                    $html .= "<img src='http://image.tmdb.org/t/p/w185$imageurl' alt=''><br>";
                    $html .= "$movie_title</a>";
                    $html .= "</div>";
                }
            }
        }
        return $html;
    }

    public function getMovieInfo()
    {
        $result = $this->singleMovieApiCall($_GET['mov_id']);
        $movie_info = $result;
        return $movie_info;
    }

}