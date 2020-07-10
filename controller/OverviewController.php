<?php
require_once 'model/OverviewLogic.php';
require_once 'model/MoviesDetailLogic.php';

/*
 * In deze controller staan alle overzichten die er bestaan.
 */

class OverviewController
{

    private $DataHandler;

    private $MoviesLogic;

    private $WatchLogic;

    public function __construct()
    {
        $this->DataHandler = new DataHandler();

        $this->MoviesLogic = new OverviewLogic();
        $this->WatchLogic = new MoviesDetailLogic();
    }

    /**
     * A overview of all popular,upcoming etc movies
     */
    public function collectMoviesOverview($title, $id)
    {
        $result = $this->MoviesLogic->MoviesOverview($id, $movieID=null, $search=null, $genre=null);
        include 'view/result.php';
    }

    /**
     * A overview of all movies with a specific search
     */
    public function collectSearch($title, $id){
        $result = $this->MoviesLogic->MoviesOverview($id, $movieID=null, $search = $_GET['search'], $genre=null);
        include 'view/result.php';
    }

    /**
     *  A list of all the genres
     */
    public function collectGenresList($title){
        $result = $this->MoviesLogic->collectGenresList();
        include 'view/result.php';
    }

    /**
     * A overview of all movies with that specific genre
     */
    public function collectGenreMoviesList($title){
        $result = $this->MoviesLogic->MoviesOverview($id = 6, $movieID=null, $search=null, $genre = $_GET['genre']);
        include 'view/result.php';
    }

}
