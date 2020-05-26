<?php
require_once 'model/MovieApiLogic.php';

class WatchLogic
{

    /**
     * @var MovieapiLogic
     */
    private $MovieApiLogic;

    public function __construct()
    {
        $this->MovieApiLogic = new MovieapiLogic();
    }

    public function collectMovieDetails($movie_id)
    {
        return $result = $this->MovieApiLogic->singleMovieApiCall($movie_id);
    }

    public function collectSearchDetails($search)
    {
        return $result = $this->MovieApiLogic->search($search);
    }

    public function collectSimilarMovies($movie_id)
    {
        $res = $this->MovieApiLogic->getSimilarMovies($movie_id);

        $html = "";
        $ip = $_SERVER["REMOTE_ADDR"];

        foreach ($res as $key => $value) {
            if ($key == "results") {
                $valueLimited = array_splice($value, 0, 8);
                foreach ($valueLimited as $arrayKey => $content) {
                    $movie_id = $content["id"];
                    $movie_title = $content["original_title"];
                    $imageurl = $content["poster_path"];

//                    $context = stream_context_create(array('http' => array('header'=>'Connection: close\r\n')));
//                    $videospider_url = file_get_contents("https://vsrequest.video/request.php?key=DBUBFDLOJCRjoGBA&secret_key=nzgbf338ysoh17zbrida1f4xrvt74d&video_id=$movie_id&tmdb=1&ip=$ip",false,$context);
//
//                    $videospider_url = file_get_contents("https://vsrequest.video/request.php?key=DBUBFDLOJCRjoGBA&secret_key=nzgbf338ysoh17zbrida1f4xrvt74d&video_id=$movie_id&tmdb=1&ip=$ip");

                    $html .= "<div class='movie-poster-box col-11 col-sm-6 col-md-4 col-lg-3'>";
                    $html .= "<a href='?request=movieDetail&mov_id=$movie_id' title='$movie_title' class='home-movie-link'>";
                    $html .= "<img src='http://image.tmdb.org/t/p/w185$imageurl' alt=''><br>";
                    $html .= mb_strimwidth($movie_title, 0, 25, '...') . "</a>";
                    $html .= "</div>";
                }
            }
        }

        return $html;
    }

    public function constructSearch($apiData)
    {
        $html = "";
        $ip = $_SERVER["REMOTE_ADDR"];
        foreach ($apiData as $key => $value) {
            if ($key == "results") {
                foreach ($value as $arrayKey => $content) {
                    $movie_id = $content["id"];
                    $movie_title = $content["original_title"];
                    $imageurl = $content["poster_path"];

                    $context = stream_context_create(array('http' => array('header' => 'Connection: close\r\n')));
                    $videospider_url = file_get_contents("https://vsrequest.video/request.php?key=DBUBFDLOJCRjoGBA&secret_key=nzgbf338ysoh17zbrida1f4xrvt74d&video_id=$movie_id&tmdb=1&ip=$ip", false, $context);

//                    $videospider_url = file_get_contents("https://vsrequest.video/request.php?key=DBUBFDLOJCRjoGBA&secret_key=nzgbf338ysoh17zbrida1f4xrvt74d&video_id=$movie_id&tmdb=1&ip=$ip");

                    $html .= "<div class='movie-poster-box col-12 col-sm-6 col-md-4 col-lg-3'>";
                    $html .= "<a href='?request=watch&link=$videospider_url&mov_id=$movie_id' title='$movie_title' class='home-movie-link'>";
                    $html .= "<img src='http://image.tmdb.org/t/p/w185$imageurl' alt=''><br>";
                    $html .= mb_strimwidth($movie_title, 0, 25, '...') . "</a>";
                    $html .= "</div>";
                }
            }
        }
        return $html;
    }

    public function collectVideospiderUrl($apiData)
    {
        $ip = $_SERVER["REMOTE_ADDR"];
        $movie_id = $_GET['mov_id'];

        $videospider_url = file_get_contents("https://vsrequest.video/request.php?key=DBUBFDLOJCRjoGBA&secret_key=nzgbf338ysoh17zbrida1f4xrvt74d&video_id=$movie_id&tmdb=1&ip=$ip");

        return $videospider_url;
    }


}
