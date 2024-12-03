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
            // Get the password from the .env file
            $pwd = getenv("pwd");

            // Correctly concatenate the password into the MongoDB URI
            $uri = "mongodb+srv://user:" . $pwd . "@cluster0.cg0le.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";

            // Create the MongoDB client
            $this->client = new Client($uri);

            return $this->client->ctf;
        } catch (Exception $e) {
            return $e->getMessage() ;
        }
    }
}
