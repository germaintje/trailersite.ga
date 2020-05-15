<?php
require_once 'controller/HomeController.php';
require_once 'controller/WatchController.php';

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

    public function __construct()
    {
        $this->HomeController = new HomeController();
        $this->WatchController = new WatchController();
    }

    function handleRequest()
    {
        try {
            $request = isset($_REQUEST['request']) ? $_REQUEST['request'] : null;
            switch ($request) {
                case 'watch':
                    $this->WatchController->collectWatch();
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