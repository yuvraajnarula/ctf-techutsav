<style>
    <?php
            include './styles.css';

    ?>    
</style>
<?php
use Src\Controllers\HomeController;

    require_once "../vendor/autoload.php";
    session_start();
    $requestURI = $_SERVER["REQUEST_URI"];
    switch( $requestURI ) {
        case "/":
            require_once "../src/controllers/homeController.php";
            $controller = new HomeController();
            echo $controller->index();
            break;
        case "/auth":
            require_once "../src/controllers/homeController.php";
            $controller = new HomeController();
            echo $controller->connectToDB();
            break;

    }
?>