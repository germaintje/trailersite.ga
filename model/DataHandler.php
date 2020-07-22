<?php
class DataHandler
{

    protected $ApiKey;
    protected $baseApiURL;

    public function __construct()
    {
        $this->baseApiURL = 'https://api.themoviedb.org/3';
        $this->ApiKey = '75e296279a5da656dbc38ffba223a8cd';
    }

    /**
     * A function to get all the info from TheMovieDataBase
     */
    public function apiCall($page, $id, $movieID, $search, $genre, $mov_or_tv, $api_type)
    {

        /**
         * a api call is provided with some variables
         *
         * $this->baseApiURL -- for the basis url where the call is going
         * $mov_or_tv        -- to look if it is for movie or tv
         * $api_type         -- to look what for call you want to make
         * $movieID          -- to get the specific ID of the movie/serie
         */

        $page = "page=" . $page;
        $apiKey = "api_key=" . $this->ApiKey;
        $search = "query=" . str_replace(" ", "%20", $search);
        $genre = "with_genres=" . $genre;


        if ($id == "Overview") {
            /**
             * 1 api call for a overview of popular, upcoming etc... for movie and tv
             */
            $curlopt_url = "$this->baseApiURL/$mov_or_tv/$api_type?$apiKey&$page";
        } elseif ($id == "Detail") {
            /**
             * 2 api call for movie or tv show details
             */
            $curlopt_url = "$this->baseApiURL/$mov_or_tv/$movieID?$apiKey";
        } elseif ($id == "Search") {
            /**
             * 3 api call for a search
             */
            $curlopt_url = "$this->baseApiURL/$api_type/multi?$apiKey&$search&$page";
        } elseif ($id == "Genre") {
            /**
             * 4 api call to get a list of all the genres
             */
            $curlopt_url = "$this->baseApiURL/$api_type/$mov_or_tv/list?$apiKey";
        } elseif ($id == "Similar") {
            /**
             * 5 api call to get similar movies as a overview
             */
            $curlopt_url = "$this->baseApiURL/$mov_or_tv/$movieID/$api_type?$apiKey&$page";
        } elseif ($id == "Overview_genre") {
            /**
             * 6 api call to get a overview of movies with one type of genre
             */
            $curlopt_url = "$this->baseApiURL/$api_type/$mov_or_tv?$apiKey&$page&$genre&$page";
        } elseif($id == "video") {
            /**
             * 7 api call to get the video keys for movie and series
             */
            $curlopt_url = "$this->baseApiURL/$mov_or_tv/$movieID/$api_type?$apiKey";
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
