<?php
require_once 'model/MovieApiLogic.php';
require_once 'model/HomeLogic.php';

class HomeController
{

    /**
     * @var MovieApiLogic
     */
    private $MovieApiLogic;
    /**
     * @var HomeLogic
     */
    private $HomeLogic;

    public function __construct()
    {
        $this->MovieApiLogic = new MovieApiLogic();
        $this->HomeLogic = new HomeLogic();
    }

    public function collectHome(){
        $res = $this->MovieApiLogic->moviesApiCall();
        $result = $this->HomeLogic->constructHome($res);
        include 'view/home.php';
    }

}