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
                    $this->OverviewController->collectSearch($_GET['request'], $id="Search", $_GET['search'], $api_type="search");
                    break;

                case 'UpcomingMovies':
                    $this->OverviewController->collectMoviesOverview($_GET['request'], $id="Overview", $mov_or_tv="movie", $api_type="upcoming");
                    break;
                case 'PopularMovies':
                    $this->OverviewController->collectMoviesOverview($_GET['request'], $id="Overview", $mov_or_tv="movie", $api_type="popular");
                    break;
                case 'NowPlayingMovies':
                    $this->OverviewController->collectMoviesOverview($_GET['request'], $id="Overview", $mov_or_tv="movie", $api_type="now_playing");
                    break;
                case 'TopRatedMovies':
                    $this->OverviewController->collectMoviesOverview($_GET['request'], $id="Overview", $mov_or_tv="movie", $api_type="top_rated");
                    break;

                /**
                 * series
                 */
                case 'PopularSeries' :
                    $this->OverviewController->collectMoviesOverview($_GET['request'], $id="Overview", $mov_or_tv="tv", $api_type="popular");
                    break;

                case 'Genres':
                    $this->OverviewController->collectGenresList($_GET['request'], $id="Genre", $mov_or_tv="movie", $api_type="genre");
                    break;

                case 'GenreMovies':
                    $this->OverviewController->collectGenreMoviesList($_GET['genreName'], $id="Overview_genre", $genre = $_GET['genre'], $mov_or_tv="movie", $api_type="discover");
                    break;

                /**
                 * Detail page for one Movie
                 */
                case 'movieDetail':
                    $this->MoviesDetailsController->collectMovieDetails($id="Detail", $mov_or_tv="movie");
                    break;

                case 'serieDetail' :
                    $this->MoviesDetailsController->collectSerieDetails($id="Detail", $mov_or_tv="tv");
                    break;

                default:
                    $this->OverviewController->collectMoviesOverview($title="PopularMovies", $id="Overview", $mov_or_tv="movie", $api_type="popular");
                    break;
            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
    }

}
