<?php
require_once 'model/MovieApiLogic.php';

class GenresLogic
{

    /**
     * @var MovieApiLogic
     */
    private $MovieApiLogic;

    public function __construct()
    {
        $this->MovieApiLogic = new MovieApiLogic();
    }

    public function collectGenresList()
    {
        $res = $this->MovieApiLogic->getGenres();

        $html = "";
        foreach ($res as $genreArray) {
            foreach ($genreArray as $genre) {
                foreach ($genre as $key => $value) {
                    if($key == "id"){
                        $genreID = $value;
                    }
                    if($key == "name") {
                        $html .= "<div class='col-5 col-md-3'><a href='?request=searchGenre&genre=$genreID&genreName=$value' class='genre-link'>$value</a></div>";
                    }
                }
            }
        }

        return $html;
    }

    public function collectGenreMoviesList($genre){

        $res = $this->MovieApiLogic->getGenreMovies($genre);

        $html = "";
        $ip = $_SERVER["REMOTE_ADDR"];

        foreach ($res as $key => $value) {
            if ($key == "results") {
                foreach ($value as $arrayKey => $content) {
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