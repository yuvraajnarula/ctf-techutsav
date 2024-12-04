<?php
    namespace src\Controllers;
    class HomeController {
        public function index(){
            include __DIR__ ."/../views/home.php";
        }
        public function game()
        {
            include __DIR__ ."/../views/xss.php";
        }
    }
?>