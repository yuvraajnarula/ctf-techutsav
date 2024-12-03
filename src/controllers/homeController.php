<?php
namespace Src\Controllers;

use MongoDB\Client;
use Exception;
use Dotenv\Dotenv;

// Load environment variables from the .env file in the project root


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
            // Build the connection URI
            $uri = "";
            // Create the MongoDB client
            $this->client = new Client($uri);
            
            $db = $this->client->ctf;
            $collection = $db->users;
            return $collection;
        } catch (Exception $e) {
            // Return the error message in case of failure
            return $e->getMessage();
        }
    }
}
