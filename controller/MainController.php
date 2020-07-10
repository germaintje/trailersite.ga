<?php
require_once 'controller/OverviewController.php';
require_once 'controller/MoviesDetailsController.php';

class MainController
{
    private $OverviewController;

    private $MoviesDetailsController;

    public function __construct()
    {
        $this->OverviewController = new OverviewController();
        $this->MoviesDetailsController = new MoviesDetailsController();
    }

    function handleRequest()
    {
        try {
            $request = isset($_REQUEST['request']) ? $_REQUEST['request'] : null;
            switch ($request) {
                /**
                 * Overview Controller cases
                 */
                case 'Search':
                    $this->OverviewController->collectSearch($_GET['request'], $_GET['request']);
                    break;

                case 'UpcomingMovies':
                case 'PopularMovies':
                    $this->OverviewController->collectMoviesOverview($_GET['request'], $_GET['request']);
                    break;

                case 'Genres':
                    $this->OverviewController->collectGenresList($_GET['request']);
                    break;

                case 'GenreMovies':
                    $this->OverviewController->collectGenreMoviesList($_GET['genreName']);
                    break;

                /**
                 * Detail page for one Movie
                 */
                case 'movieDetail':
                    $this->MoviesDetailsController->collectMovieDetails();
                    break;

                default:
                    $this->OverviewController->collectMoviesOverview();
                    break;
            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
    }

}
