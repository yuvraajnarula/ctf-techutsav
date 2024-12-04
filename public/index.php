<style>
    <?php
            include './styles.css';

    ?>    
</style>
<?php

use Src\Controllers\DbInjectionController;
use Src\Controllers\HomeController;

    require_once "../vendor/autoload.php";
    session_start();
    $requestURI = $_SERVER["REQUEST_URI"];
    switch( $requestURI ) {
        case "/":
            require_once "../src/controllers/HomeController.php";
            $controller = new HomeController();
            echo $controller->index();
            break;
        case "/xss/game":
            require_once "../src/controllers/HomeController.php";
            $controller = new HomeController();
            echo $controller->game();
            break;
        case "/dbInjection":
            require_once "../src/controllers/DbInjectionController.php";
            $controller = new DbInjectionController();
            echo $controller->index();
            break;
        case "/auth":
            require_once "../src/controllers/DbInjectionController.php";
            $controller = new DbInjectionController();
            echo $controller->connectToDB();
            break;

    }
?>