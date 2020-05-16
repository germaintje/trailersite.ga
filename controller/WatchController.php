<?php
require_once 'model/MovieApiLogic.php';

class WatchController
{
    /**
     * @var MovieApiLogic
     */
    private $MovieApiLogic;

    public function __construct()
    {
        $this->MovieApiLogic = new MovieApiLogic();
    }

    public function collectWatch(){
        $movieInfo = $this->MovieApiLogic->singleMovieApiCall($_GET['mov_id']);
        $videospider_url = $_GET['link'];
        include 'view/watch.php';
    }

    public function collectSearch(){
        $searchInfo = $this->MovieApiLogic->searchMovie();

        include 'view/search.php';
    }

}
