<?php
require_once 'controller/MoviesController.php';
require_once 'controller/WatchController.php';
require_once 'controller/GenresController.php';

class MainController
{

    /**
     * @var MoviesController
     */
    private $MoviesController;
    /**
     * @var WatchController
     */
    private $WatchController;
    /**
     * @var GenresController
     */
    private $GenresController;

    public function __construct()
    {
        $this->MoviesController = new MoviesController();
        $this->WatchController = new WatchController();
        $this->GenresController = new GenresController();
    }

    function handleRequest()
    {
        try {
            $request = isset($_REQUEST['request']) ? $_REQUEST['request'] : null;
            switch ($request) {
                case 'watch':
                    $this->WatchController->collectWatch();
                    break;

                case 'search':
                    $this->WatchController->collectSearch();
                    break;

                case 'genres':
                    $this->GenresController->collectGenresList();
                    break;

                case 'searchGenre':
                    $this->GenresController->collectGenreMoviesList();
                    break;

                case 'popularMovies':
                    $this->MoviesController->collectPopularMovies();
                    break;

                case 'movieDetail':
                    $this->WatchController->collectMovieDetailMovie();
                    break;

                default:
                    $this->MoviesController->collectPopularMovies();
                    break;
            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
    }

}
