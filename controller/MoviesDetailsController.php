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
    public function collectMovieDetails()
    {
        $movieInfo = $this->MoviesDetailLogic->collectMovieDetails($_GET['mov_id']);
        $similarMovies = $this->OverviewLogic->MoviesOverview($id=5, $movieID=$_GET['mov_id'], $search=null, $genre=null);

        $videospider_url = $this->MoviesDetailLogic->collectVideospiderUrl();

        include 'view/watch.php';
    }

}
