<?php
require_once 'DataHandler.php';

class MoviesDetailLogic
{

    private $DataHandler;

    public function __construct()
    {
        $this->DataHandler = new DataHandler();
    }

    public function collectMovieDetails($id, $movie_id, $mov_or_tv)
    {
        return $result = $this->DataHandler->apiCall($page=null, $id, $movie_id, $search=null, $genre=null, $mov_or_tv, $api_type=null);
    }

    public function collectVideospiderUrl($movie_id, $mov_or_tv, $api_type)
    {
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

            $res = $this->DataHandler->apiCall($page=null, $id="video", $movie_id, $search=null, $genre=null, $mov_or_tv, $api_type);

            foreach ($res as $key => $value) {
                if ($key == "results") {
                    foreach ($value as $arrayKey => $content) {
                        $yt_key = $content["key"];

                        $videospider_url = "https://www.youtube.com/embed/$yt_key";
                    }
                }else{
                    $videospider_url = null;
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
