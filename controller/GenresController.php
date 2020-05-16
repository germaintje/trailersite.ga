<?php
require_once 'model/GenresLogic.php';

class GenresController
{

    /**
     * @var GenresLogic
     */
    private $GenresLogic;

    public function __construct()
    {
        $this->GenresLogic = new GenresLogic();
    }
    
    public function collectGenresList(){
        $result = $this->GenresLogic->collectGenresList();
        include 'view/genresList.php';
    }

    public function collectGenreMoviesList(){
        $result = $this->GenresLogic->collectGenreMoviesList($_GET['genre']);
        include 'view/genreMoviesList.php';
    }

}