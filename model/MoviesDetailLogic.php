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

//    public function collectSimilarMovies($movie_id)
//    {
//        $res = $this->DataHandler->apiCall($page=null, $id=5, $movie_id, $search=null, $genre=null);
//
//        $html = "";
//        foreach ($res as $key => $value) {
//            if ($key == "results") {
//                $valueLimited = array_splice($value, 0, 8);
//                foreach ($valueLimited as $arrayKey => $content) {
//                    $movie_id = $content["id"];
//                    $movie_title = $content["original_title"];
//                    $imageurl = $content["poster_path"];
//
//                    $html .= "<div class='movie-poster-box col-11 col-sm-6 col-md-4 col-lg-3'>";
//                    $html .= "<a href='?request=movieDetail&mov_id=$movie_id' title='$movie_title' class='home-movie-link'>";
//                    $html .= "<img src='http://image.tmdb.org/t/p/w185$imageurl' alt=''><br>";
//                    $html .= mb_strimwidth($movie_title, 0, 25, '...') . "</a>";
//                    $html .= "</div>";
//                }
//            }
//        }
//
//        return $html;
//    }

    public function collectVideospiderUrl()
    {
        $ip = $_SERVER["REMOTE_ADDR"];
        $movie_id = $_GET['mov_id'];

//       $videospider_url = $this->DataHandler->apiCall($page, $id, $movie_id, $search, $genre);

        $videospider_url = file_get_contents("https://vsrequest.video/request.php?key=DBUBFDLOJCRjoGBA&secret_key=nzgbf338ysoh17zbrida1f4xrvt74d&video_id=$movie_id&tmdb=1&ip=$ip");

        return $videospider_url;
    }


}
