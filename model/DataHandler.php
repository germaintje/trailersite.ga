<?php
class DataHandler
{

    protected $ApiKey;

    public function __construct()
    {
        $this->ApiKey = '75e296279a5da656dbc38ffba223a8cd';
    }

    /**
     * A function to get all the info from TheMovieDataBase
     */
    public function apiCall($page, $id, $movieID, $search, $genre)
    {
        if ($id == "PopularMovies") {
            $curlopt_url = "https://api.themoviedb.org/3/movie/popular?api_key=$this->ApiKey&page=$page";
        } elseif ($id == 2) {
            $curlopt_url = "https://api.themoviedb.org/3/movie/$movieID?api_key=$this->ApiKey";
        } elseif ($id == "Search") {
            $curlopt_url = "https://api.themoviedb.org/3/search/movie?api_key=$this->ApiKey&query=" . str_replace(" ", "%20", $search) . ";&page=$page";
        } elseif ($id == 4) {
            $curlopt_url = "https://api.themoviedb.org/3/genre/movie/list?api_key=$this->ApiKey";
        } elseif ($id == 5) {
            $curlopt_url = "https://api.themoviedb.org/3/movie/$movieID/similar?api_key=$this->ApiKey&page=$page";
        } elseif ($id == 6) {
            $curlopt_url = "https://api.themoviedb.org/3/discover/movie?api_key=$this->ApiKey&sort_by=popularity.desc&include_video=false&page=1&with_genres=$genre&page=$page";
        } elseif($id == 7) {
            $curlopt_url = "https://api.themoviedb.org/3/movie/$movieID/videos?api_key=$this->ApiKey";
        } elseif($id == "UpcomingMovies"){
            $curlopt_url = "https://api.themoviedb.org/3/movie/upcoming?api_key=$this->ApiKey&page=$page";
        }else {
            $curlopt_url = "";
            echo "<div class='alert alert-danger' role='alert' style='text-align: center'>Oeps verkeerd!!!</div>";
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => "$curlopt_url",
            CURLOPT_ENCODING => "",
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_TCP_FASTOPEN => 1
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $result = json_decode($response, true);
    }

}
