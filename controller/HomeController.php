<?php
require_once 'model/MovieApiLogic.php';

class HomeController
{

    /**
     * @var MovieApiLogic
     */
    private $MovieApiLogic;

    public function __construct()
    {
        $this->MovieApiLogic = new MovieApiLogic();
    }

    public function collectHome(){
        $result = $this->MovieApiLogic->constructHome();
        include 'view/home.php';
    }

}