<?php
    namespace src\Controllers;
    class HomeController {
        public function index(){
            include __DIR__ ."/../views/home.php";
        }
        public function xss()
        {
            include __DIR__ ."/../views/xss.php";
        }
        public function fileInclusion(){
            include __DIR__ ."/../views/fileInclusion.php";
        }
    }
?>