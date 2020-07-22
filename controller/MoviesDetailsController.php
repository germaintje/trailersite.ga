<?php
require_once 'model/MoviesDetailLogic.php';
require_once 'model/OverviewLogic.php';

/*
 * In deze controlelr staan de movie detail pagina's
 */

class MoviesDetailsController
{
    private $MoviesDetailLogic;
    private $OverviewLogic;

    public function __construct()
    {
        $this->MoviesDetailLogic = new MoviesDetailLogic();
        $this->OverviewLogic = new OverviewLogic();
    }

    /**
     * A detail page for the selected movie
     */
    public function collectMovieDetails($id, $mov_or_tv)
    {
        $movieInfo = $this->MoviesDetailLogic->collectMovieDetails($id, $_GET['mov_id'], $mov_or_tv);
        var_dump($movieInfo);
        $similarMovies = $this->OverviewLogic->MoviesOverview($id="Similar", $movieID=$_GET['mov_id'], $search=null, $genre=null, $mov_or_tv, $api_type="similar");

//        $actors = $this->OverviewLogic->MoviesOverview($id="Similar", $movieID=$_GET['mov_id'], $search=null, $genre=null, $mov_or_tv, $api_type="similar");

        $videospider_url = $this->MoviesDetailLogic->collectVideospiderUrl($_GET['mov_id'], $mov_or_tv, $api_type="videos");

        include 'view/watch.php';
    }

    public function collectSerieDetails($id, $mov_or_tv)
    {
        $movieInfo = $this->MoviesDetailLogic->collectMovieDetails($id, $_GET['mov_id'], $mov_or_tv);
        var_dump($movieInfo);
        $videospider_url = $this->MoviesDetailLogic->collectVideospiderUrl($_GET['mov_id'], $mov_or_tv, $api_type="videos");

        include 'view/watch_series.php';
    }

}
