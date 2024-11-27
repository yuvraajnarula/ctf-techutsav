<?php
require __DIR__  . '../../../vendor/autoload.php'; // Correct path to vendor/autoload.php

// Include the file that loads environment variables
use MongoDB\Client;

try {
    $uri = "mongodb+srv://user:IqGLFVEcBanVFcoo@cluster0.cg0le.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";
    $client = new Client($uri);
    echo "<h1>Connected to the database</h1>";
} catch (Exception $e) {
    // Catch and display any errors
    echo "<h1>Error: " . $e->getMessage() . "</h1>";
}
?>
