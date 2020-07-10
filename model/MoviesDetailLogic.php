<?php
require_once 'DataHandler.php';

class MoviesDetailLogic
{

    private $DataHandler;

    public function __construct()
    {
        $this->DataHandler = new DataHandler();
    }

    public function collectMovieDetails($movie_id)
    {
        return $result = $this->DataHandler->apiCall($page=null, $id=2, $movie_id, $search=null, $genre=null);
    }

    public function collectVideospiderUrl($movie_id)
    {
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

            $res = $this->DataHandler->apiCall($page=null, $id=7, $movie_id, $search=null, $genre=null);

            foreach ($res as $key => $value) {
                if ($key == "results") {
                    foreach ($value as $arrayKey => $content) {
                        $yt_key = $content["key"];

                        $videospider_url = "https://www.youtube.com/embed/$yt_key";
                    }
                }
            }

            return $videospider_url;
        }else {
            $ip = $_SERVER["REMOTE_ADDR"];
            $movie_id = $_GET['mov_id'];

            $videospider_url = file_get_contents("https://vsrequest.video/request.php?key=DBUBFDLOJCRjoGBA&secret_key=nzgbf338ysoh17zbrida1f4xrvt74d&video_id=$movie_id&tmdb=1&ip=$ip");

            return $videospider_url;
        }
    }


}
