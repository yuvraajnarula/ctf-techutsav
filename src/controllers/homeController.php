<?php
namespace Src\Controllers;

use MongoDB\Client;
use Exception;

class HomeController {
    private $client;

    public function index() {
        // Correct the path to your view file
        include __DIR__ . "/../../views/login.php";
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

            return "<h1>Connected to the MongoDB database successfully</h1>";
        } catch (Exception $e) {
            return "<h1>Failed to connect: " . $e->getMessage() . "</h1>";
        }
    }
}
