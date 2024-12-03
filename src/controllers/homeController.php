<?php
namespace Src\Controllers;

use MongoDB\Client;
use Exception;

class HomeController {
    public $client;

    public function index() {
        include __DIR__ . "/../views/login.php";
    }

    public function __construct() {
        $this->client = null;
    }

    public function connectToDB() {
        try {
            $pwd = $_ENV["pwd"];

            $uri = "mongodb+srv://user:" . $pwd . "@cluster0.cg0le.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";

            $this->client = new Client($uri);

            $db = $this->client->ctf;

            return $db->users;
        } catch (Exception $e) {
            return $e->getMessage() ;
        }
    }
}
?>