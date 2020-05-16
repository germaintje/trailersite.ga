<?php
require_once 'model/MovieApiLogic.php';
require_once 'model/WatchLogic.php';

class WatchController
{
    /**
     * @var MovieApiLogic
     */
    private $MovieApiLogic;
    /**
     * @var Watchlogic
     */
    private $WatchLogic;

    public function __construct()
    {
        $this->MovieApiLogic = new MovieApiLogic();
        $this->WatchLogic = new WatchLogic();
    }

    public function collectWatch(){
        $movieInfo = $this->WatchLogic->collectMovieDetails($_GET['mov_id']);
        $similarMovies = $this->WatchLogic->collectSimilarMovies($_GET['mov_id']);
        $videospider_url = $_GET['link'];
        include 'view/watch.php';
    }

    public function collectSearch(){
        $searchInfo = $this->MovieApiLogic->searchMovie();

        include 'view/search.php';
    }

}
