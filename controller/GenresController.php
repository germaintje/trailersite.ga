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
        include 'view/genres.php';
    }

}