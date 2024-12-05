<?php
namespace Src\Controllers;

use MongoDB\Client;
use Exception;
use Dotenv\Dotenv;


class DbInjectionController {
    public $client;

    public function index() {
        include __DIR__ . "/../views/login.php";
    }

    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . "..\..\..");
        $dotenv->load();
        $this->client = null;
    }

    public function connectToDB() {
        try {
            // Build the connection URI
            $uri = $_ENV["URI"];
            // Create the MongoDB client
            $this->client = new Client($uri);

            $db = $this->client->ctf;
            $collection = $db->users;
            return $collection;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
