<?php

// Include the Composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Load the .env file
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
