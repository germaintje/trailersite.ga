<?php
require_once 'model/MovieApiLogic.php';
require_once 'model/MoviesLogic.php';
require_once 'model/WatchLogic.php';

require_once 'Utilities/Pagination.php';

class MoviesController
{

    /**
     * @var MovieApiLogic
     */
    private $MovieApiLogic;
    /**
     * @var MoviesLogic
     */
    private $MoviesLogic;

    private $Pagination;

    public function __construct()
    {
        $this->MovieApiLogic = new MovieApiLogic();
        $this->MoviesLogic = new MoviesLogic();
        $this->Pagination = new Pagination();
    }

//    public function collectHome(){
//        $res = $this->MovieApiLogic->moviesApiCall($_GET['page']);
//        $result = $this->MoviesLogic->constructHome($res);
//
//        $pagination = $this->MoviesLogic->HomePagination($res);
//        include 'view/home.php';
//    }

    public function collectPopularMovies()
    {
        $res = $this->MovieApiLogic->moviesApiCall($_GET['page']);
        $result = $this->MoviesLogic->popularMovies($res);

        $pagination = $this->Pagination->Pagination_Overview($res);
        include 'view/home.php';
    }

}
