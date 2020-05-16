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

    public function collectSimilarMovies($movie_id)
    {
        $res = $this->MovieApiLogic->getSimilarMovies($movie_id);

        $html = "";
        $ip = $_SERVER["REMOTE_ADDR"];

        foreach ($res as $key => $value) {
            if ($key == "results") {
                $valueLimit4 = array_splice($value, 0, 4);
                foreach ($valueLimit4 as $arrayKey => $content) {
                    $movie_id = $content["id"];
                    $movie_title = $content["original_title"];
                    $imageurl = $content["poster_path"];
                    $videospider_url = file_get_contents("https://vsrequest.video/request.php?key=DBUBFDLOJCRjoGBA&secret_key=nzgbf338ysoh17zbrida1f4xrvt74d&video_id=$movie_id&tmdb=1&ip=$ip");

                    $html .= "<div class='movie-poster-box col-11 col-sm-6 col-md-4 col-lg-3'>";
                    $html .= "<a href='?request=watch&link=$videospider_url&mov_id=$movie_id' title='$movie_title' class='home-movie-link'>";
                    $html .= "<img src='http://image.tmdb.org/t/p/w185$imageurl' alt=''><br>";
                    $html .= "$movie_title</a>";
                    $html .= "</div>";
                }
            }
        }

        return $html;
    }

}