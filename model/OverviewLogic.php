<?php
require_once 'DataHandler.php';

class OverviewLogic
{
    private $DataHandler;

    public function __construct()
    {
        $this->DataHandler = new DataHandler();
    }

    public function __destruct()
    {

    }

    public function MoviesOverview($id, $movieID, $search, $genre)
    {
        if(!isset($_GET['page']) && empty($_GET['page'])){
            $page = "1";
        }else{
            $page = $_GET['page'];
        }

        $apiData = $this->DataHandler->apiCall($page, $id, $movieID, $search, $genre);

        $html = "";
        foreach ($apiData as $key => $value) {
            if ($key == "results") {
                foreach ($value as $arrayKey => $content) {
                    $movie_id = $content["id"];
                    $movie_title = $content["original_title"];
                    $imageurl = $content["poster_path"];
                    $stars = $content["vote_average"];

                    $html .= "<div class='movie-poster-box col-12 col-sm-6 col-md-4 col-lg-3'>";
//                    $html .= "<p>popular</p>";
                    $html .= "<a href='?request=movieDetail&mov_id=$movie_id' title='$movie_title' class='home-movie-link'>";
                    $html .= "<img src='http://image.tmdb.org/t/p/w185$imageurl' alt=''><br>";
                    $html .= mb_strimwidth($movie_title, 0, 25, '...') . "</a>";
                    $html .= "</div>";
                }
            }
        }
        include 'Utilities/Pagination.php';

        return $html;
    }

    /**
     * A list of all the genres
     */
    public function collectGenresList()
    {
        $res = $this->DataHandler->apiCall($page=null, $id=4, $movie_id=null, $search=null, $genre=null);

        $html = "";
        foreach ($res as $genreArray) {
            foreach ($genreArray as $genre) {
                foreach ($genre as $key => $value) {
                    if($key == "id"){
                        $genreID = $value;
                    }
                    if($key == "name") {
                        $html .= "<div class='col-5 col-md-3'><a href='?request=GenreMovies&genre=$genreID&genreName=$value' class='genre-link'>$value</a></div>";
                    }
                }
            }
        }

        return $html;
    }

}
