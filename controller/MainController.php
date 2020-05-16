<?php
require_once 'controller/HomeController.php';
require_once 'controller/WatchController.php';
require_once 'controller/GenresController.php';

class MainController
{

    /**
     * @var HomeController
     */
    private $HomeController;
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
        $this->HomeController = new HomeController();
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

                default:
                    $this->HomeController->collectHome();
                    break;
            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
    }

}
