<?php


class MovieApiLogic
{

    protected $ApiKey;


    public function __construct()
    {
        $this->ApiKey = '75e296279a5da656dbc38ffba223a8cd';

    }

    public function moviesApiCall($page)
    {
//        $page = 1;
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/popular?api_key=$this->ApiKey&page=$page",
            CURLOPT_ENCODING => "",
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_TCP_FASTOPEN => 1
        ]);

        $response = curl_exec($curl);
//        $err = curl_error($curl);

        curl_close($curl);

        return $result = json_decode($response, true);

    }

    public function singleMovieApiCall($movieID)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movieID?api_key=$this->ApiKey",
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

    public function search($search)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?api_key=$this->ApiKey&query=" .str_replace(" ", "%20", $search). ";",
            CURLOPT_ENCODING => "",
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_TCP_FASTOPEN => 1
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $result = json_decode($response, true);
    }

    public function getGenres(){
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => "https://api.themoviedb.org/3/genre/movie/list?api_key=$this->ApiKey",
            CURLOPT_ENCODING => "",
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_TCP_FASTOPEN => 1
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $result = json_decode($response, true);
    }

    public function getSimilarMovies($movieID){
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movieID/similar?api_key=$this->ApiKey&page=1",
            CURLOPT_ENCODING => "",
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_TCP_FASTOPEN => 1
        ]);

        $response = curl_exec($curl);
//        $err = curl_error($curl);

        curl_close($curl);

        return $result = json_decode($response, true);
    }

    public function getGenreMovies($genre){

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => "https://api.themoviedb.org/3/discover/movie?api_key=$this->ApiKey&sort_by=popularity.desc&include_video=false&page=1&with_genres=$genre",
            CURLOPT_ENCODING => "",
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_TCP_FASTOPEN => 1
        ]);

        $response = curl_exec($curl);
//        $err = curl_error($curl);

        curl_close($curl);

        return $result = json_decode($response, true);
    }

}
