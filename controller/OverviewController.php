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
    public function collectMoviesOverview($title, $id, $mov_or_tv, $api_type)
    {
        $result = $this->MoviesLogic->MoviesOverview($id, $movieID=null, $search=null, $genre=null, $mov_or_tv, $api_type);
        include 'view/result.php';
    }

    /**
     * A overview of all movies with a specific search
     */
    public function collectSearch($title, $id, $search, $api_type){
        $result = $this->MoviesLogic->MoviesOverview($id, $movieID=null, $search, $genre=null, $mov_or_tv=null, $api_type);
        include 'view/result.php';
    }

    /**
     *  A list of all the genres
     */
    public function collectGenresList($title, $id, $mov_or_tv, $api_type)
    {
        $all_genres = $this->MoviesLogic->collectGenresList($id, $mov_or_tv, $api_type);
        include 'view/all_genres.php';
    }

    /**
     * A overview of all movies with that specific genre
     */
    public function collectGenreMoviesList($title, $id, $genre, $mov_or_tv, $api_type){
        $result = $this->MoviesLogic->MoviesOverview($id, $movieID=null, $search=null, $genre, $mov_or_tv, $api_type);
        include 'view/result.php';
    }

}
