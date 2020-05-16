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
                    if($key == "name") {
                        $html .= "<div class='col-5 col-md-3'><a href='?request=searchGenre&genre=$value' class='genre-link'>$value</a></div>";
                    }
                }
            }
        }

        return $html;
    }

}