<?php
session_start();
    require_once 'controller/MainController.php';
    $controller = new MainController();
    $controller->handleRequest();

